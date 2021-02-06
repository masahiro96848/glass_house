<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OffersTableSeeder::class);
        $this->call(MatchingsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(CategoryUserTableSeeder::class);
        $this->call(JobsTableSeeder::class);
    }
}
