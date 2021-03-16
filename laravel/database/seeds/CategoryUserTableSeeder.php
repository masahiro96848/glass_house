<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all(); 
        
        // userデータを作成
        factory(App\User::class, 100)->create()->each(function(App\User $user) use($categories) {
            $random = rand(1, 1);

            // 中間テーブルに紐付け
            $user->categories()->attach($categories->random($random)->pluck('id')->toArray(),

            );
        });
    }
}
