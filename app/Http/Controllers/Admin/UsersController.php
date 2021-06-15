<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        return User::with('roles')->where('role', '!=', 1)->get();
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['success' => 'User added successfully']);
    }

    // public function addRole(Request $request, Role $role)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()->all()]);
    //     }
    //     $roleExist = $role->where('name', $request->name)->first();
    //     if ($roleExist) {
    //         return response()->json(['errors' => 'Role already exists']);
    //     }
    //     $role->create($request->all());

    //     return response()->json(['success' => 'Successfully add new role']);
    // }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        User::findOrFail($id)->update($request->all());
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
    }
}