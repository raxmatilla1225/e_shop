<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(StoreUserRequest $request){

        $model = new User();
        $model->name = $request->get('name');
        $model->email = $request->get('email');
        $model->password = password_hash($request->get('password'), PASSWORD_DEFAULT);
        if($model->save()){
            return redirect()->route('users.index')->with('success','User created successfully');
        }
        return redirect()->back();
    }
    public function edit(User $user){

        return view('admin.users.edit', ['user' => $user]);
    }
    public function update(UpdateUserRequest $request , User $user){
        $user = $user->update($request->validated());
        if($user){
            return redirect()->route('users.index')->with('success','User updated successfully');
        }
        return redirect()->back();
    }
    public function show(User $user){
        return view('admin.users.show', ['user'=> $user]);
    }

    public function destroy(User $user){
       $status =  $user->delete();
        if($status){
            return redirect()->route('users.index')->with('success','User deleted successfully');
        }
        return redirect()->back();
    }

    public function indexLogin(){
        if(\auth()->check()){
            return redirect()->route('admin.dashboard.index');
        }
        return view('admin.login.login');
    }
    public function adminLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return redirect()->route('admin.dashboard.index');

        }
        return redirect()->back()->with('error', 'This account is not real');
    }


}
