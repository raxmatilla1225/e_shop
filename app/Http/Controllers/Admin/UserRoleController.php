<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserRoleRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_roles = UserRole::with('user')->with('role')->get();
      return view('admin.user_role.index', ['user_roles' => $user_roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.user_role.create', ['users' => $users , 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRoleRequest $request)
    {
        $user_role = new UserRole();
        $user_role->user_id = $request->user;
        $user_role->role_id  = $request->role;
        if ($user_role->save()) {
            return redirect()->route('user_role.index')->with('success', 'UserRole created successfully');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $user_role)
    {
      $user = User::find($user_role->user_id);
      $role = Role::find($user_role->role_id);

        return view('admin.user_role.show', ['user' => $user , 'role' => $role, 'user_role' => $user_role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $user_role)
    {
        $user_role->user = User::find($user_role->user_id);
        $user_role->role = Role::find($user_role->role_id);
        $users = User::all();
        $roles = Role::all();
        return view('admin.user_role.edit', ['users' => $users , 'roles' => $roles, 'user_role' => $user_role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UserRole $user_role)
    {
     $user_role->user_id = $request->get('user');
     $user_role->role_id = $request->get('role');
     if($user_role->update()){
         return redirect()->route('user_role.index')->with('success', 'UserRole updated successfully');
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $user_role)
    {
        $d = $user_role->delete();
        if ($d) {
            return redirect()->route('user_role.index')->with('success', 'UserRole deleted successfully');
        }
    }
}
