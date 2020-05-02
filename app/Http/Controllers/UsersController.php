<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('Users.index',compact('users'));
    }

    public function edit($id){


        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit',compact(['user','roles']));
    }

    public function update(Request $request,User $user){
        $data = $this->validator($request->all())->validate();

        $user->roles()->sync($request->roles);

        $user->name = $data['name'];
        $user->email = $data['email'];

        if($user->save())
            $request->session()->flash('success','تم تحديث المستخدم بنجاح');
        else
            $request->session()->flash('error','يوجد مشكلة في البيانات المدخلة');

        $users = User::all();
        return redirect()->back()->withInput();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'token' => 'string|max:255|nullable',
            'chat_id' => 'string|max:255|nullable',
            'roles' => 'required'
        ]);
    }
}
