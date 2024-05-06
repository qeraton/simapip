<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\DB;
use Hash;
use Session;
use App\Models\{
    Obyek,
    jabatan,
};
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(5);
        return view('role-permission.role.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,description'
            ]
        ]);

        Role::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return Redirect::to('roles')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(Role $role)
    {
        return view('role-permission.role.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,description,'.$role->id
            ]
        ]);

        $role->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return Redirect::to('roles')->with('success', 'Berhasil MengUpdate Data!');
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return Redirect::to('roles')->with('success', 'Berhasil MengHapus Data!');
    }

    public function addPermissionToRole($roleId) 
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                                ->all();

        return view('role-permission.role.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId) 
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('success', 'Berhasil Menambah Permission Ke Role');
    }
}
