<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Course;
use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();
        // Category::factory(5)->create();
        // Course::factory(20)->create();
        // Video::factory(100)->create();

        $this->call(PermissionSeeder::class);
    }
}
