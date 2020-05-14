<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{

####################### view All Users #########################
    public function index(){
        abort_unless( \Gate::allows('users-access') ,403);

        //if session key not define in ToSweetAlert file
        if(session('success_message')){
            Alert::success('Success!',session('success_message'));
//            Alert::image('User image!','User profile image', asset('dist/img/user3-128x128.jpg'));
        }

        $users = User::all();
        return view('Users.index',compact('users'));
    }
####################### delete User #########################
    public function destroy($id)
    {
        abort_unless( \Gate::allows('users-delete') ,403);
        $user = User::findOrFail($id);
        $user->delete();
        //Redirect to a specified route with flash message.
        return redirect()
            ->route('users.index')
            ->with('success','تم حزف المستخدم بنجاح!');
    }
####################### edit User #########################

    public function edit($id){
        abort_unless( \Gate::allows('users-edit') ,403);

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit',compact(['user','roles']));
    }
## update and Assign Roles and Edit Telegram settings for All User ##

    public function update(Request $request,User $user){
        abort_unless( \Gate::allows('users-update') ,403);

        $data = $this->validator($request->all())->validate();

        $user->roles()->sync($request->roles);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if(isset($request->password_changed)){
            $password_valid = $this->passwordValidate($request->all())->validate();
            $password = Hash::make($password_valid['password']);
            $user->password = $password; //hashed password.
        }
       if($user->save()){
//           $request->session()->flash('success','تم تحديث المستخدم بنجاح');
//           Alert::success('Success User', 'تم تحديث المستخدم بنجاح');
//           Alert::Image('User image!','User profile image', asset('dist/img/user1-128x128.jpg'));
           Alert::toast('Toast Message', 'info');

       }
        else{
            $request->session()->flash('errors','يوجد مشكلة في البيانات المدخلة');
        }

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
