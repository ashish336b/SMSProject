<?php

namespace Tests\Feature\Admin;

use App\Admin;
use App\Teachers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTeacherTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function admin_get_teacher_index_page()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->get('/admin/teachers');
        $response->assertStatus(200);
        $response->assertViewIs('admin.teachers.index');
    }
    /** @test */
    public function admin_can_get_add_teacher_form()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->get('/admin/teachers/add');
        $response->assertStatus(200);
        $response->assertViewIs('admin.teachers.add');
    }
    /** @test */
    public function admin_can_create_new_teachers()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->post('/admin/teachers/add', [
            'firstName' => 'Ashish',
            'lastName' => 'Bhandari',
            'rollNumber' => '001',
            'email' => 'ashish336b@gmail.com',
            'password' => '11111111',
            'password_confirmation' => '11111111',
            'address' => 'sindhuli',
            'phoneNumber' => '11111111',
            'department_id' => '1',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('admin/teachers/add');
        $response->assertSessionHas('success');
    }

    /** @test */
    public function admin_have_to_fill_all_form_before_adding_teacher()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->from('admin/teachers/add')->post('/admin/teachers/add', [
            'firstName' => null,
            'lastName' => null,
            'rollNumber' => null,
            'email' => null,
            'password' => null,
            'password_confirmation' => null,
            'address' => null,
            'phoneNumber' => null,
            'department_id' => '1',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('admin/teachers/add');
        $response->assertSessionHasErrors([
            'firstName' => 'The first name field is required.',
            'lastName' => 'The last name field is required.',
            'rollNumber' => 'The roll number field is required.',
            'email' => 'The email field is required.',
            'password' => 'The password field is required.',
            'address' => 'The address field is required.',
            'phoneNumber' => 'The phone number field is required.',
        ]);
    }

    /** @test */
    public function admin_have_to_register_with_correct_email()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->from('admin/teachers/add')->post('/admin/teachers/add', [
            'firstName' => "admin",
            'lastName' => "admin",
            'rollNumber' => "admin",
            'email' => "asdfas",
            'password' => '11111111',
            'password_confirmation' => "11111111",
            'address' => "asdf",
            'phoneNumber' => "asdf",
            'department_id' => '1',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('admin/teachers/add');
        $response->assertSessionHasErrors([
            'email' => 'The email must be a valid email address.',
        ]);
    }

    /** @test */
    public function admin_have_to_type_both_password_same()
    {
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->from('admin/teachers/add')->post('/admin/teachers/add', [
            'firstName' => "test",
            'lastName' => "test",
            'rollNumber' => "test",
            'email' => "test@gmail.com",
            'password' => "11111111",
            'password_confirmation' => "22222222",
            'address' => "11111111",
            'phoneNumber' => "11111111",
            'department_id' => '1',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('admin/teachers/add');
        $response->assertSessionHasErrors([
            'password' => 'The password confirmation does not match.',
        ]);
    }

    /** @test */
    public function admin_have_to_register_teacher_with_unique_email_address()
    {
        $data = factory(Teachers::class)->create();
        $this->actingAs(factory(Admin::class)->create(), 'admin')->withSession(['foo' => 'bar']);
        $response = $this->from('admin/teachers/add')->post('/admin/teachers/add', [
            'firstName' => "test",
            'lastName' => "test",
            'rollNumber' => $data->rollnumber,
            'email' => $data->email,
            'password' => "11111111",
            'password_confirmation' => "22222222",
            'address' => "11111111",
            'phoneNumber' => "11111111",
            'department_id' => '1',
            "_token" => 'sdfasfdsf',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('admin/teachers/add');
        $response->assertSessionHasErrors('rollNumber');
        $response->assertSessionHasErrors('email');
    }
}
