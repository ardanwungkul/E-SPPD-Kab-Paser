<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar User', ['only' => ['index']]);
        $this->middleware('permission:Tambah User', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit User', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus User', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = User::all();
        return view('master.user.index', compact('data'));
    }
    public function create()
    {
        $role = Role::whereNot('name', 'Super Admin')->get();
        return view('master.user.create', compact('role'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus User']);
    }
    public function edit(User $user)
    {
        $role = Role::whereNot('name', 'Super Admin')->get();
        return view('master.user.edit', compact('role', 'user'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:30',
                'username' => 'required|unique:user|max:20',
                'email' => 'required|unique:user|max:30',
                'password' => 'required',
                'role_id' => 'required',
            ],
            [
                'name.max' => 'Nama User Tidak Boleh Lebih dari 30 Karakter',
                'username.max' => 'Username Tidak Boleh Lebih dari 20 Karakter',
                'email.max' => 'Email Tidak Boleh Lebih dari 30 Karakter',
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $role = Role::find($request->role_id);
        $user->assignRole($role);
        return redirect()->route('users.index')->with(['success' => 'Berhasil Menambahkan User']);
    }
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required|max:30',
                'username' => 'required|max:20|unique:user,username,' . $user->id,
                'email' => 'required|max:30|unique:user,email,' . $user->id,
                'role_id' => 'required',
            ],
            [
                'name.max' => 'Nama User Tidak Boleh Lebih dari 30 Karakter',
                'username.max' => 'Username Tidak Boleh Lebih dari 20 Karakter',
                'email.max' => 'Email Tidak Boleh Lebih dari 30 Karakter',
            ]
        );
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->has('password') && $request->password !== null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $role = Role::find($request->role_id);
        $user->syncRoles($role);
        return redirect()->route('users.index')->with(['success' => 'Berhasil Mengubah User']);
    }
}
