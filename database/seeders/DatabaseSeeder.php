<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;

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

        $role_admin = Role::factory()->create([
            'title' => 'Admin',
            'slug' => 'admin',
            'status' => 1
        ]);

        $role_user = Role::factory()->create([
            'title' => 'User',
            'slug' => 'user',
            'status' => 1
        ]);

        $admin = User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$GX/idMoeq7lQqMNlE2rIFebxAYghUvCBNzspmeSGLH1rBM54NyZLm' //password
        ]);

        $user = User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'user',
            'email' => 'user@user.com',
            'password' => '$2y$10$GX/idMoeq7lQqMNlE2rIFebxAYghUvCBNzspmeSGLH1rBM54NyZLm' //password
        ]);

        $admin->roles()->attach($role_admin->id);
        $user->roles()->attach($role_user->id);


        Category::factory()->create([
            'title' => 'Men',
            'parent_id' => null,
            'status' => 1
        ]);

        Category::factory()->create([
            'title' => 'Women',
            'parent_id' => null,
            'status' => 1
        ]);

        Category::factory()->create([
            'title' => 'Child',
            'parent_id' => null,
            'status' => 1
        ]);

        Category::factory()->create([
            'title' => 'Electronic',
            'parent_id' => null,
            'status' => 1
        ]);

        Category::factory()->create([
            'title' => 'Fashion',
            'parent_id' => null,
            'status' => 1
        ]);

        Category::factory()->create([
            'title' => 'Groceries',
            'parent_id' => null,
            'status' => 1
        ]);

    }

    
}
