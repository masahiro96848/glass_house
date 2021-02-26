<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    use RefreshDatabase;

    public function testUserIndex()
    {
        $response = $this->get(route('users.index'));

        $response->assertStatus(200)->assertViewIs('users.index');
    }
}
