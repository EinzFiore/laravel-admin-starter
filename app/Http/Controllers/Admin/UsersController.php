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
        $data = User::with('roles')->get();
        return \DataTables::of($data)
            ->editColumn('created_at', function ($request) {
                return $request->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('Actions', function ($data) {
                return '<button type="button" class="btn btn-primary btn-sm" id="edit" data-id="' . $data->id . '">Edit</button>
                    <button type="button" data-id="' . $data->id . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="delete">Delete</button>';
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
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}