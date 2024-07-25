<?php

namespace Heydari81\RolePermissions\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::findOrCreate('teacher');
        Role::findOrCreate('bookseller');
        Role::findOrCreate('manager');
        Role::findOrCreate('super_admin');
        Role::findOrCreate('student');
    }
}
