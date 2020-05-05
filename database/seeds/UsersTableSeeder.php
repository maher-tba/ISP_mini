<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $password = Hash::make('password');
        $user = new User;
        $user->name = 'المدير';
        $user->email = 'admin@admin.com';
        $user->password = $password; //hashed password.
        $user->save();
    }
}
