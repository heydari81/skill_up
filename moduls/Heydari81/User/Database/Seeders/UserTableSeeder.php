<?php

namespace Heydari81\User\Database\Seeders;

use Heydari81\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
foreach (User::$defaultUsers as $defaultUser){
    $user = new User();
    $user->name = $defaultUser['name'];
    $user->email = $defaultUser['email'];
    $user->password = Hash::make($defaultUser['password']);
    $user->assignRole($defaultUser['role']);
    $user->save();
}
    }
}
