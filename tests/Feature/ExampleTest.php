<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/auth/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function testInvalidEmailPassword()
    {
        $response = $this->post('/auth/login', [
            'email'     => 'NOT_FOUND',
            'password'  => 'NOT_FOUND'
        ]);

        $response->assertStatus(302);
        $this->assertGuest();
    }

    public function testLoginAsAdmin()
    {
        $user = User::create([
            'name'      => 'morley',
            'email'     => 'tae@yahoo.com',
            'password'  => bcrypt('password'),
            'role_id'   => 1
        ]);

        $response = $this->post('/auth/login', [
            'email'     => $user->email,
            'password'  => 'password'
        ]);


        $response->assertRedirect('/admin/home');
        $this->actingAs($user);


    }

    public function testLoginAsBilling()
    {
        $user = User::create([
            'name'      => 'morley',
            'email'     => 'tae@yahoo.com',
            'password'  => bcrypt('password'),
            'role_id'   => 2
        ]);

        $response = $this->post('/auth/login', [
            'email'     => $user->email,
            'password'  => 'password'
        ]);


       
        $user = $this->actingAs($user);
        $response->assertRedirect('/billing/home');
    }

    
}
