<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'エンジニア'],
            ['id' => 2, 'name' => 'デザイナー'],
            ['id' => 3, 'name' => 'マーケティング'],
            ['id' => 4, 'name' => 'ディレクター'],
            ['id' => 5, 'name' => 'コンサルタント'],
            ['id' => 6, 'name' => '起業家'],
            ['id' => 7, 'name' => 'YouTuber'],
            ['id' => 8, 'name' => 'アーティスト'],
            ['id' => 9, 'name' => 'クリエイター'],
        ];
        DB::table('categories')->insert($categories);
    }
}
