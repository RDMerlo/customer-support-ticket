<?php

namespace Database\Seeders;

use App\Domain\Role\Models\Role;
use App\Domain\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::whereEmail('admin@admin.ru')->first();

        if(!$user) {

            $user = User::create([
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'password' => bcrypt('mheDX0wQt0'),
            ]);

            if (!$user->hasRole('admin')) {
                $user->assignRole(Role::ADMIN_ROLE);
            }
            if (!$user->hasRole('editor')) {
                $user->assignRole(Role::EDITOR_ROLE);
            }
        }

        $user = User::whereEmail('editor@editor.ru')->first();

        if(!$user) {

            $user = User::create([
                'name' => 'editor',
                'email' => 'editor@editor.ru',
                'password' => bcrypt('vrtHG0wQt0'),
            ]);

            if (!$user->hasRole('editor')) {
                $user->assignRole(Role::EDITOR_ROLE);
            }
        }

//        $user = User::whereEmail('user1@test.ru')->first();
//
//        if(!$user) {
//
//            $user = User::create([
//                'name' => 'user1',
//                'email' => 'user1@test.ru',
//                'password' => bcrypt('lpothcjft'),
//            ]);
//
//            $user->assignRole(Role::READER_ROLE);
//        }
    }
}
