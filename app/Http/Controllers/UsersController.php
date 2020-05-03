<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

####################### view All Users #########################
    public function index(){
        $users = User::all();
        return view('Users.index',compact('users'));
    }
####################### delete User #########################
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        //Redirect to a specified route with flash message.
        return redirect()
            ->route('users.index')
            ->with('success','تم حزف المستخدم بنجاح!');
    }
####################### edit User #########################

    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit',compact(['user','roles']));
    }
## update and Assign Roles and Edit Telegram settings for All User ##

    public function update(Request $request,User $user){
        $data = $this->validateUpdateUser($request->all())->validate();
        $user->roles()->sync($request->roles);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if($user->save())
            $request->session()->flash('success','تم تحديث المستخدم بنجاح');
        else
            $request->session()->flash('error','يوجد مشكلة في البيانات المدخلة');
        $users = User::all();
        return redirect('/users');
    }

######################### registration User ########################
    public function addUser(){
        return view('settings.addUser');
    }
    public function registerUser(Request $request){

        $data = $this->validateAddNewUser($request->all())->validate();
        $password = Hash::make($data['password']);
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $password; //hashed password.
        $user->token = $data['token']? '': $data['token'];
        $user->chat_id = $data['chat_id']? '': $data['chat_id'];
        $user->save();

        // assign user Role for registration user
        $userRole = Role::select('id')->where('name','user')->first();
        $user->Roles()->attach($userRole);
        $user->save();

        return redirect('/users');
    }
#################### validate validator Request add User and update ##############
    protected function validateUpdateUser(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'token' => 'string|max:255|nullable',
            'chat_id' => 'string|max:255|nullable',
            'roles' => 'required'
        ]);
    }
    protected function validateAddNewUser(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token' => 'string|max:255|nullable',
            'chat_id' => 'string|max:255|nullable',
        ]);
    }
########################### End validate ##################################
}
