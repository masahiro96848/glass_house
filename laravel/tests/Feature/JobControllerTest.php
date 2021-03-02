<?php

namespace Tests\Feature;

use App\User;
use App\Job;

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


    // 新規投稿画面
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


    // 新規登録機能のテスト
    // 未ログイン時のテスト
    public function testGuestCreate()
    {
        $response = $this->post(route('job.create'));

        $response->assertRedirect(route('login'));
    }

    // ログイン済み
    public function testAuthCreate()
    {
        // テストデータを追加(UserとJobのデータを追加)
        $user = factory(User::class)->create();
        $title = 'テストタイトル';
        $summary = 'テスト内容';
        $user_id = $user->id;

        // post送信して実行する
        $response = $this->actingAs($user)->post(route('job.create', [
            'title' => $title,
            'summary' => $summary,
            'user_id' => $user_id,
        ]));

        // テストデータが登録しているかを確認
        $this->assertDatabaseHas('jobs', [
            'title' => $title,
            'summary' => $summary,
            'user_id' => $user_id,
        ]);

        $response->assertRedirect(route('job.index'));

    }

    // 編集画面テスト
    // 未ログイン時
    public function testGuestEdit()
    {
        $job = factory(Job::class)->create();

        $response = $this->get(route('job.edit', ['id' => $job->id]));

        $response->assertRedirect(route('login'));
    }

    // ログイン済み
    public function testAuthEdit()
    {
        $job = factory(Job::class)->create();
        $user = $job->user;

        $response = $this->actingAs($user)->get(route('job.edit', ['id' => $job]));

        $response->assertForbidden();
        
    }
}
