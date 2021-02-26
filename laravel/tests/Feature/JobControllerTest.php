<?php

namespace Tests\Feature;

use App\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    // 未ログイン時のテスト
    public function testGuestNew()
    {
        $response = $this->get(route('job.new'));

        $response->assertRedirect(route('login'));
    }

    // ログイン済みのテスト
    public function testAuthNew()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('job.new'));

        $response->assertStatus(200)->assertViewIs('job.new');
    }
}
