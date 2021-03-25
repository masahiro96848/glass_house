<?php

use Illuminate\Database\Seeder;
use App\Category;

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
            'エンジニア',
            'デザイナー',
            'マーケティング',
            'ディレクター',
            'コンサルタント',
            '起業家',
            'YouTuber',
            'アーティスト',
            '動画・映像クリエイター',
            'ディレクター',
            '営業・セールス',
            'ブロガー',
            'Instagramer',
            '人事・採用',
            'ライター',
            'カメラマン',
            '税理士',
            '弁護士',
            '公認会計士',
            '社会保険労務士',
            '料理家',
            '医師',
            '学生',
            '教師',
            '漫画家',
            'アスリート'
        ];
        foreach($categories as $category) {
            Category::updateOrCreate([
                'name' => $category
            ]);
        }
    }
}
