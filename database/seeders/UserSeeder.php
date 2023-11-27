<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //gets the admin role from the role table. The role is attached to a user on [Line 31]
        $role_admin = Role::where('name', 'admin')->first();

        //gets the user role from the role table. The role is attached to a user on [Line 40]
        $role_user = Role::where('name', 'admim')->first();


        //admin defined using the User model
        $admin = new User();
        $admin->name = 'Thomas Lawrence';
        $admin->email = 'thomas@larafest.ie';
        $admin->password = Hash::make('password'); //The 'Hash::make()' function converts the password into cryptic/hashed text. Used for security purposes
        $admin->save();

        //attach the admin role to the user. The role was created on [Line 16]
        $admin->roles()->attach($role_admin);

        //user defined using the User model
        $user = new User();
        $user->name = 'Joe Jones';
        $user->email = 'joe@larafest.ie';
        $user->password = Hash::make('password');


    }
}
