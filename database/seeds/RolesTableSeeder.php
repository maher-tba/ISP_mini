<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $role2 = new Role;
        $role2->name = 'admin';
        $role2->name_ar = 'مدير';
        $role2->save();

        $role1 = new Role;
        $role1->name = 'user';
        $role1->name_ar = 'مستخدم';
        $role1->save();

        $role1 = new Role;
        $role1->name = 'author';
        $role1->name_ar = 'المالك';
        $role1->save();
        $user = User::findOrFail(1);
        $user->Roles()->attach($role1);
        $user->Roles()->attach($role2);

    }
}
