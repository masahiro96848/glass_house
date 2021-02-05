<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'guest',
            'email' => 'guest@sample.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'intro' => 'テスト',
            'talk_theme' => 'test',
            'speaking' => 'テスト',
            'remember_token' => 'テスト',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];

        

        DB::table('users')->insert($user);
    }
}
