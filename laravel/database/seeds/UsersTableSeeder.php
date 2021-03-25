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
        // for($i = 1; $i <= 5; $i++) {
        //     User::create([
        //         'id' => $i,
        //         'name' => 'test'. $i,
        //         'email' => 'test'. $i  .'@sample.com',
        //         'email_verified_at' => now(),
        //         'password' => Hash::make('password'),
        //         'intro' => 'テスト',
        //         'talk_theme' => 'test',
        //         'speaking' => 'テスト',
        //         'created_at' => new DateTime(),
        //         'updated_at' => new DateTime(),
        //     ]);
        // }

        $samples = [
            [
                'name' => 'guest',
                'email' => 'guest@sample.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'intro' => 'ゲストログインして頂きありがとうございます!',
                'talk_theme' => '本サービスはビジネスマン、経営者、副業をしている人におすすめです',
                'speaking' => 'glass houseご利用頂きありがとうございます。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'glass house',
                'email' => 'glass@sample.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'intro' => 'glass house運営者です！　サービスをリリースしました。不明点、不備がありましたらご連絡くださいませ。',
                'talk_theme' => '気になるユーザーがいましたらいいね、話してみたいボタンを押しましょう！',
                'speaking' => 'プロフィール編集、トークテーマを作成して頂きますと相手からのアプローチが植えます！',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ];
        DB::table('users')->insert($samples);
        
    }
}
