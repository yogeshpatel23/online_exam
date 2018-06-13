<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role = new Role();
        $user_role->name = 'User';
        $user_role->description = 'A Normal User';
        $user_role->save();

        $admin_role = new Role();
        $admin_role->name = 'Admin';
        $admin_role->description = 'An Admin';
        $admin_role->save();
    }
}
