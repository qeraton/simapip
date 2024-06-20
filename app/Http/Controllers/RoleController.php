<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
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
        try {
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'unique:roles,name'
                ],
                'description' => [
                    'required',
                    'string'
                ]
            ]);

            $name = ucwords(strtolower($request->name));
            $description = ucwords(strtolower($request->description));
            Role::create([
                'name' => $name,
                'description' => $description
            ]);

            return Redirect::to('roles')->with('success', 'Berhasil Menambah Data Role!');
        } catch (ValidationException $e) {
            // Periksa apakah kesalahan berasal dari field 'name'
            if ($e->validator->errors()->has('name')) {
                return Redirect::back()
                    ->withErrors(['name' => 'Role dengan nama ini sudah ada. Silakan gunakan nama lain.'])
                    ->withInput();
            }

            // Tangani validasi lainnya jika ada
            return Redirect::back()->withErrors($e->validator)->withInput();
        }
    }

    public function edit(Role $role)
    {
        return view('role-permission.role.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        try {
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    Rule::unique('roles')->ignore($role->id)
                ],
                'description' => [
                    'required',
                    'string'
                ]
            ]);

            $name = ucwords(strtolower($request->name));
            $description = ucwords(strtolower($request->description));
            $role->update([
                'name' => $name,
                'description' => $description
            ]);

            return Redirect::to('roles')->with('success', 'Berhasil Mengupdate Data Role!');
        } catch (ValidationException $e) {
            // Periksa apakah kesalahan berasal dari field 'name'
            if ($e->validator->errors()->has('name')) {
                return Redirect::back()
                    ->withErrors(['name' => 'Role dengan nama ini sudah ada. Silakan gunakan nama lain.'])
                    ->withInput();
            }

            // Tangani validasi lainnya jika ada
            return Redirect::back()->withErrors($e->validator)->withInput();
        } catch (QueryException $e) {
            // Tangani pelanggaran constraint unik secara umum
            if ($e->getCode() == 23000) { // 23000 adalah kode error untuk pelanggaran constraint unik
                return Redirect::back()
                    ->withErrors(['name' => 'Role dengan nama ini sudah ada. Silakan gunakan nama lain.'])
                    ->withInput();
            }

            // Tangani exception database lainnya jika ada
            return Redirect::back()->withErrors($e->getMessage())->withInput();
        }
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
