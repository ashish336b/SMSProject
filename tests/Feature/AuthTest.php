<?php

namespace Tests\Feature;

use App\Admin;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AuthTest extends TestCase
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
    }

    /**
     * @test
     */
    public function only_loggedin_admin_can_access_adminDashboard()
    {
        $response = $this->get('/admin')->assertRedirect('/admin/login');
    }

    /** @test */
    public function auth_admin_cannot_access_admin_login_form()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->get('/admin/login');
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
    public function show_teacher_data()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->get('/admin/teachers');
        $response->assertStatus(200);
    }

    /** @test */
    public function admin_can_create_teacher()
    {

    }
}
