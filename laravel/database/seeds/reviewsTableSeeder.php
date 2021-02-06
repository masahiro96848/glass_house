<?php

use Illuminate\Database\Seeder;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10; $i++) {
            Review::create([
                'title' => 'テスト投稿です',
                'star' => rand(1, 5),
                'body' => 'テスト文です',
                'reviewer_id' => 1,
                'reviewed_id' => $i + 1,
                'matching_id' => $i,
                'created_at' => now(),
            ]);
        }
    }
}
