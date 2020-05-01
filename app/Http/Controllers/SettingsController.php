<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function addUser(){
        return view('settings.addUser');
    }
    public function registerUser(Request $request){

        $data = $this->validator($request->all())->validate();
        $password = Hash::make($data['password']);
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $password; //hashed password.
        $user->token = $data['token']? '': $data['token'];
        $user->chat_id = $data['chat_id']? '': $data['chat_id'];
        $user->save();
        return redirect('/home');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token' => 'string|max:255|nullable',
            'chat_id' => 'string|max:255|nullable',

        ]);
    }
}
