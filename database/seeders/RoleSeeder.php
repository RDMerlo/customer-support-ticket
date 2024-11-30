<?php

namespace Database\Seeders;

use App\Domain\Role\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::whereName(Role::ADMIN_ROLE)->first();

        if(!$role) {
            Role::create(['name' => Role::ADMIN_ROLE]);
        }

        $role = Role::whereName(Role::EDITOR_ROLE)->first();

        if(!$role) {
            Role::create(['name' => Role::EDITOR_ROLE]);
        }

        $role = Role::whereName(Role::READER_ROLE)->first();

        if(!$role) {
            Role::create(['name' => Role::READER_ROLE]);
        }
    }
}
