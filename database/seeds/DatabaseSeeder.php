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
        // $this->call(UserSeeder::class);
        // $this->call([logoImproveTableSeeder::class]);
        $this->call([logoTypeTableSeeder::class]);
        // $this->call([logoFormatTableSeeder::class]);
        // $this->call([logoColorTableSeeder::class]);
    }
}
