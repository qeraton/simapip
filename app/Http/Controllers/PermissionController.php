<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Session;
use App\Models\{
    Obyek,
    jabatan,
};
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Permission', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create Permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Permission', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete Permission', ['only' => ['destroy']]);
    }
    public function index() {
        $permissions = Permission::paginate(4);
        return view('role-permission.permission.index', [
            'permissions' => $permissions
        ]);
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return Redirect::to('permissions')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(Permission $permission)
    {
        return view('role-permission.permission.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);
        return Redirect::to('permissions')->with('success', 'Berhasil MengUpdate Data!');
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return Redirect::to('permissions')->with('success', 'Berhasil MengHapus Data!');
    }
}
