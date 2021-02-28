<?php

use Illuminate\Database\Seeder;
use App\Offer;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 5; $i++) {
            Offer::create([
                'status' => '承認待ち',
                'user_id' => 1,
                'created_at' => now(),
            ]);
        }
    }
}
