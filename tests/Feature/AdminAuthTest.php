<?php

namespace Tests\Feature;

use App\Admin;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */

    public function show_login_form()
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertViewIs('auth.admin-login');
    }

    /**
     * @test
     */
    public function only_loggedin_admin_can_access_adminDashboard()
    {
        $response = $this->get('/admin');
        $response->assertStatus(302);
        $response->assertRedirect('/admin/login');
    }

    /** @test */
    public function auth_admin_cannot_view_admin_login_form()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->get('/admin/login');
        $response->assertStatus(302);
        $response->assertRedirect('/admin');
    }

    /** @test */

    public function show_admin_dashboard() /* baseUrl/admin */
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }
    /** @test */
    public function admin_have_to_login_with_correct_credential()
    {
        $admin = factory(Admin::class)->create([
            'password' => bcrypt('22222222'),
        ]);
        $response = $this->post('admin/login', [
            'email' => $admin->email,
            'password' => '22222222',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/admin');
    }

    /**
     * @test
     */
    public function admin_cannot_login_with_incorrect_password()
    {
        $admin = factory(Admin::class)->create([
            'email' => 'ashish336b@gmail.com',
            'password' => bcrypt('22222222'),
        ]);
        $response = $this->from('/admin/login')->post('/admin/login', [
            'email' => $admin->email,
            'password' => 'invalid-password',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/admin/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function remember_me_in_admin_form()
    {
        $password = '11111111';
        $admin = factory(Admin::class)->create([
            'password' => bcrypt($password),
        ]);

        $response = $this->post('/admin/login', [
            'email' => $admin->email,
            'password' => $password,
            'remember' => 'on',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/admin');
        $this->actingAs($admin, 'admin')->withSession(['foo' => 'bar']);
        $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $admin->id,
            $admin->getRememberToken(),
            $admin->password,
        ]));
    }

    /** @test */
    public function user_receives_an_email_with_a_password_reset_link()
    {
        Notification::fake();

        $user = factory(Admin::class)->create();

        $response = $this->post('admin/password/email', [
            'email' => $user->email,
        ]);
        $token = DB::table('password_resets')->first();
        $this->get('admin/password/reset/'.$token->token)->assertStatus(200);

        /* Notification::assertSentTo($user, ResetPassword::class, function ($notification, $channels) use ($token) {
            dd($notification);
            return Hash::check($notification->token, $token->token) === true;
        }); */
    }

}
