<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\TestResponse;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/register', [
            'firstname' => 'Person',
            'lastname' => 'Exempelsson',
            'phone' => '0701111111',
            'email' => 'person@exempel.test',
            'adress' => 'exempelgatan 1',
            'postcode' => '12345',
            'city' => 'Stockholm',
            'password' => 'testexempel',
            'password_confirmation' => 'testexempel'
        ]);

        $response->assertRedirect('/dashboard');
        $response->assertStatus(201);
    }
}
