<?php

use Illuminate\Database\Seeder;
use App\Telegram;
use Illuminate\Support\Facades\DB;

class TelegramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('telegrams')->delete();

        $telegram = new Telegram;
        $telegram->token = '992707655:AAHhK8oCwa-z1lwZcX_ShiyD1yZtoVou0ik';
        $telegram->chat_id = '-1001414421544';
        $telegram->message = 'السلام عليكم';
        $telegram->user_id = 1;
        $telegram->save();


    }
}
