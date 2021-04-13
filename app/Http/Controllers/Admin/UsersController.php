<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function index()
    {
        $data['role'] = Role::get();
        return view('admin.users.index', $data);
    }

    public function getData()
    {
        $data = User::with('roles')->where('role', '>', 1)->get();
        return \DataTables::of($data)
            ->editColumn('created_at', function ($request) {
                return $request->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('Actions', function ($data) {
                return '<button type="button" class="btn btn-primary btn-sm" id="editUser" data-id="' . $data->id . '">Edit</button>
                    <a href="/admin/users/delete/' . $data->id . '" class="btn btn-danger btn-md" id="deleteUser">Delete</a>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $userExist = User::where('username', $request->username)->orWhere('email', $request->email)->first();
        if ($userExist) {
            return response()->json(['errors' => 'User data already exists']);
        } else {
            $user->create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            return response()->json(['success' => 'User added successfully']);
        }
    }

    public function addRole(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $roleExist = $role->where('name', $request->name)->first();
        if ($roleExist) {
            return response()->json(['errors' => 'Role already exists']);
        }
        $role->create($request->all());

        return response()->json(['success' => 'Successfully add new role']);
    }

    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json(['success' => 'Successfully update User']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'Users deleted successfully');
    }
}