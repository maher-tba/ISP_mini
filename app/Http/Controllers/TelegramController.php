<?php

namespace App\Http\Controllers;

use App\Notifications\RepliedToTask;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function notifyUser(){
        auth()->user()->notify(new repliedToTask);
    }

    public function settings()
    {
        $users  = User::all();
        return view('telegram.settings',compact('users'));
    }

    public function storeMessageToUser(User $user,$title)
    {
        $user_token = $user->token;
        $telegram = new Api($user_token);
        $resp = $telegram->getMe();
        $chat_id_group = $user->chat_id;
        $text = urlencode($title);
        $url =  "https://api.telegram.org/bot".$user_token."/sendMessage?chat_id=".$chat_id_group."&text=".$text;
        // create get Guzzle Request
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);

        return redirect()->back();
    }

    public function approveMessageToAuthor(User $author,$title,User $user)
    {

        $user_token = $author->token;
        $telegram = new Api($user_token);
        $resp = $telegram->getMe();
        $chat_id_group = $author->chat_id;

        // TODO CHECK IF THERE IS INTERNET !!
        // IF NO INTERNIT -> session()->flash('error', 'لم يتم ارسال الرسالة حاول مرة اخلاحقا' .$request->user_name);

        $title = " تم انجاز المهمة المرسلة الى ".$user->name."'".$title."' ";
        $text = urlencode($title);
        $url =  "https://api.telegram.org/bot".$user_token."/sendMessage?chat_id=".$chat_id_group."&text=".$text;

        // create get Guzzle Request
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);

        return redirect()->back();
    }

    public function sendpdf($fileName)
    {
        $path = 'reports/'.$fileName;
        $user_token = "868714414:AAFV4p_4MAiEW_STSjHhEkOuWOTtRntNuy8";
        $telegram = new Api($user_token);
        $resp = $telegram->sendDocument([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001168248546'),
            'document' => InputFile::createFromContents(file_get_contents($path),  date('Y-m-d') . '.pdf' )
        ]);
    }
}
