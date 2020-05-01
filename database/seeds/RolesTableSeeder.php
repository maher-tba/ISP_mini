<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role2 = new Role;
        $role2->name = 'admin';
        $role2->name_ar = 'مدير';
        $role2->save();

        $role1 = new Role;
        $role1->name = 'user';
        $role1->name_ar = 'مستخدم';
        $role1->save();

        $user = User::findOrFail(1);
        $user->Roles()->attach($role1);
        $user->Roles()->attach($role2);

    }
}
