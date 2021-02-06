<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Job::class, 3)->create()->each(function(App\Job $job) {
            $job->user()->associate(factory(App\User::class)->create());
        });
    }
}
