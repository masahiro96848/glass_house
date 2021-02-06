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
        for($i = 1; $i <= 10; $i++) {
            User::create([
                'id' => $i,
                'name' => 'test'. $i,
                'email' => 'test'. $i  .'@sample.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'intro' => 'テスト',
                'talk_theme' => 'test',
                'speaking' => 'テスト',
                // 'remember_token' => str_random(10),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }

        $sample = [
            [
                'name' => 'guest',
                'email' => 'guest@sample.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'intro' => 'テスト',
                'talk_theme' => 'test',
                'speaking' => 'テスト',
                // 'remember_token' => str_random(10),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '高橋浩一',
                'email' => 'takahashi@sample.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'intro' => 'テスト',
                'talk_theme' => 'test',
                'speaking' => 'テスト',
                // 'remember_token' => str_random(10),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ];
        DB::table('users')->insert($sample);
        
    }
}
