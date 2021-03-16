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
            ['id' => 9, 'name' => '動画・映像クリエイター'],
            ['id' => 10, 'name' => 'ディレクター'],
            ['id' => 11, 'name' => '営業・セールス'],
            ['id' => 12, 'name' => 'ブロガー'],
            ['id' => 13, 'name' => 'Instagramer'],
            ['id' => 14, 'name' => '人事・採用'],
            ['id' => 15, 'name' => 'ライター'],
            ['id' => 16, 'name' => 'カメラマン'],
            ['id' => 17, 'name' => '税理士'],
            ['id' => 18, 'name' => '弁護士'],
            ['id' => 19, 'name' => '公認会計士'],
            ['id' => 20, 'name' => '社会保険労務士'],
            ['id' => 21, 'name' => '料理家'],
            ['id' => 22, 'name' => '医師'],
            ['id' => 23, 'name' => '学生'],
            ['id' => 24, 'name' => '教師'],

        ];
        DB::table('categories')->insert($categories);
    }
}
