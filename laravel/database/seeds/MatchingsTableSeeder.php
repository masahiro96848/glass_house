<?php

use Illuminate\Database\Seeder;
use App\Matching;

class MatchingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10; $i++) {
            Matching::create([
                'apply_id' => 1,
                'approve_id' => $i + 1 ,
                'offer_id' => $i,
            ]);
        }
    }
}
