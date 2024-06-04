<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Hash;
use Session;
use App\Models\{
    Obyek,
    jabatan,
};
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:View Role', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create Role', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole']]);
        $this->middleware('permission:Edit Role', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete Role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::get();
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

        return Redirect::to('roles')->with('success', 'Berhasil Menambah Data Role!');
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
                // 'unique:roles,name,description,'.$role->id
                Rule::unique('roles')->where(function ($query) use ($role) {
                    return $query->where('name', $role->name)->where('description', $role->description);
                })->ignore($role->id),
            ]
        ]);

        $role->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return Redirect::to('roles')->with('success', 'Berhasil MengUpdate Data Role!');
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return Redirect::to('roles')->with('success', 'Berhasil MengHapus Data Role!');
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
