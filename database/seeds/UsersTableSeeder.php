<?php

use App\User;
use Illuminate\Database\Seeder;
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
        $password = Hash::make('password');
        $user = new User;
        $user->name = 'المدير';
        $user->email = 'admin@admin.com';
        $user->token = '992707655:AAHhK8oCwa-z1lwZcX_ShiyD1yZtoVou0ik';
        $user->chat_id = '-1001414421544';
        $user->password = $password; //hashed password.
        $user->save();
    }
}
