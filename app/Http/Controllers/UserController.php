<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('master.user.index', compact('data'));
    }
    public function create()
    {
        $bidang = Bidang::all();

        return view('master.user.create', compact('bidang'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus User']);
    }
    public function edit(User $user)
    {
        $bidang = Bidang::all();
        return view('master.user.edit', compact('user', 'bidang'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'username' => 'required|unique:user|max:30',
                'password' => 'required|max:150',
                'bidang_id' => 'required',
                'level' => 'required',
            ],
            [
                'name.max' => 'Nama User Tidak Boleh Lebih dari 50 Karakter',
                'username.max' => 'Username Tidak Boleh Lebih dari 30 Karakter',
                'password.max' => 'Password Tidak Boleh Lebih dari 150 Karakter',
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->bidang_id = $request->bidang_id;
        $user->level = $request->level;
        $user->password = Hash::make($request->password);
        $user->aktif = $request->has('aktif') && $request->aktif == 'on' ? 'Y' : 'T';
        $user->save();
        return redirect()->route('users.index')->with(['success' => 'Berhasil Menambahkan User']);
    }
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'username' => 'required|max:30|unique:user,username,' . $user->id,
                'password' => 'max:150',
                'bidang_id' => 'required',
                'level' => 'required',
            ],
            [
                'name.max' => 'Nama User Tidak Boleh Lebih dari 50 Karakter',
                'username.max' => 'Username Tidak Boleh Lebih dari 30 Karakter',
                'password.max' => 'Password Tidak Boleh Lebih dari 150 Karakter',
            ]
        );
        $user->name = $request->name;
        $user->username = $request->username;
        $user->bidang_id = $request->bidang_id;
        $user->level = $request->level;
        if ($request->has('password') && $request->password !== null) {
            $user->password = Hash::make($request->password);
        }
        $user->aktif = $request->has('aktif') && $request->aktif == 'on' ? 'Y' : 'T';
        $user->save();
        return redirect()->route('users.index')->with(['success' => 'Berhasil Mengubah User']);
    }
}
