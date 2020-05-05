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

        $data = $this->validator($request->all())->validate();
        $user->roles()->sync($request->roles);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if(isset($request->password_changed)){
            $password_valid = $this->passwordValidate($request->all())->validate();
            $password = Hash::make($password_valid['password']);
            $user->password = $password; //hashed password.
        }
       if($user->save())
            $request->session()->flash('success','تم تحديث المستخدم بنجاح');
        else
            $request->session()->flash('error','يوجد مشكلة في البيانات المدخلة');
        $users = User::all();
        return redirect('/users');
    }

######################### registration User ########################
    public function addUser(){
        return view('Users.addUser');
    }
    public function registerUser(Request $request){
        $data = $this->validator($request->all())->validate();
        $password_valid = $this->passwordValidate($request->all())->validate();
        $user = new User;
        $password = Hash::make($password_valid['password']);
        $user->password = $password; //hashed password.
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        // assign user Role for registration user
        $userRole = Role::select('id')->where('name','user')->first();
        $user->Roles()->attach($userRole);
        $user->save();
        return redirect('/users');
    }
#################### validate validator Request add User and update ##############
    protected function validator(array $request)
    {
        return  Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

    }

    protected function passwordValidate(array $request )
    {
        return Validator::make($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);
    }
########################### End validate ##################################
}
