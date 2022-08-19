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

        $role_admin = Role::create([
            'title' => 'Admin',
            'slug' => 'admin',
            'status' => 1
        ]);

        $role_user = Role::create([
            'title' => 'User',
            'slug' => 'user',
            'status' => 1
        ]);

        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$GX/idMoeq7lQqMNlE2rIFebxAYghUvCBNzspmeSGLH1rBM54NyZLm' //password
        ]);

        $user = User::create([
            'first_name' => 'User',
            'last_name' => 'user',
            'email' => 'user@user.com',
            'password' => '$2y$10$GX/idMoeq7lQqMNlE2rIFebxAYghUvCBNzspmeSGLH1rBM54NyZLm' //password
        ]);

        $admin->roles()->attach($role_admin->id);
        $user->roles()->attach($role_user->id);


        Category::create([
            'title' => 'Men',
            'parent_id' => null,
            'status' => 1
        ]);

        Category::create([
            'title' => 'Women',
            'parent_id' => null,
            'status' => 1
        ]);

<<<<<<< HEAD
    
=======
        Category::create([
            'title' => 'Child',
            'parent_id' => null,
            'status' => 1
        ]);

>>>>>>> d413c284cd980c172787bc79d651dc995802aec8
        Category::create([
            'title' => 'Electronic',
            'parent_id' => null,
            'status' => 1
        ]);

        Category::create([
            'title' => 'Fashion',
            'parent_id' => null,
            'status' => 1
        ]);

        Category::create([
            'title' => 'Groceries',
            'parent_id' => null,
            'status' => 1
        ]);

    }

    
}
