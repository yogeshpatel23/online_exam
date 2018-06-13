<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->first_name = 'Admin';
        $admin->last_name = 'JustHindustan';
        $admin->email = 'admin@role.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach(Role::where('name','Admin')->first());
    }
}
