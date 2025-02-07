<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Role', ['only' => ['index']]);
        $this->middleware('permission:Tambah Role', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Role', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data = Role::all();
        return view('master.role.index', compact('data'));
    }
    public function create()
    {
        $permission = Permission::orderBy('id', 'desc')->get();
        return view('master.role.create', compact('permission'));
    }
    public function edit(Role $role)
    {
        $permission = Permission::orderBy('id', 'desc')->get();
        return view('master.role.edit', compact('permission', 'role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:role,name',
            'permission_id' => 'required|array|min:1',
            'permission_id.*' => 'exists:permission,id',
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        $permission = Permission::whereIn('id', $request->permission_id)->get();
        $role->syncPermissions($permission);
        return redirect()->route('role.index')->with(['success' => 'Berhasil Menambahkan Role']);
    }
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|unique:role,name,' . $role->id,
            'permission_id' => 'required|array|min:1',
            'permission_id.*' => 'exists:permission,id',
        ]);
        $role->name = $request->name;
        $role->save();
        $permission = Permission::whereIn('id', $request->permission_id)->get();
        $role->syncPermissions($permission);
        return redirect()->route('role.index')->with(['success' => 'Berhasil Mengubah Role']);
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Role']);
    }
}
