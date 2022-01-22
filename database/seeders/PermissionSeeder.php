<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => 'categories.index', 'name' => 'Show all categories'],
            ['code' => 'categories.show', 'name' => 'Show single category'],
            ['code' => 'categories.create', 'name' => 'Create new category'],
            ['code' => 'categories.edit', 'name' => 'Update category'],
            ['code' => 'categories.delete', 'name' => 'Delete category'],

            ['code' => 'courses.index', 'name' => 'Show all courses'],
            ['code' => 'courses.show', 'name' => 'Show single course'],
            ['code' => 'courses.create', 'name' => 'Create new course'],
            ['code' => 'courses.edit', 'name' => 'Update course'],
            ['code' => 'courses.delete', 'name' => 'Delete course'],

            ['code' => 'videos.index', 'name' => 'Show all videos'],
            ['code' => 'videos.show', 'name' => 'Show Single video'],
            ['code' => 'videos.create', 'name' => 'Create new video'],
            ['code' => 'videos.edit', 'name' => 'Update video'],
            ['code' => 'videos.delete', 'name' => 'Delete video'],
        ];

        Permission::insert($data);
    }
}
