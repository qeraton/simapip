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
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

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
        $permissions = Permission::get();
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
        try {
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'unique:permissions,name'
                ]
            ]);

            $name = ucwords(strtolower($request->name)); // Mengubah nama permission menjadi format yang diinginkan
            Permission::create([
                'name' => $name
            ]);

            return Redirect::to('permissions')->with('success', 'Berhasil Menambah Data Permission!');
        } catch (ValidationException $e) {
            // Periksa apakah kesalahan berasal dari field 'name'
            if ($e->validator->errors()->has('name')) {
                return Redirect::back()
                    ->withErrors(['name' => 'Permission dengan nama ini sudah ada. Silakan gunakan nama lain.'])
                    ->withInput();
            }

            // Tangani validasi lainnya jika ada
            return Redirect::back()->withErrors($e->validator)->withInput();
        }
    }

    public function edit(Permission $permission)
    {
        return view('role-permission.permission.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        try {
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    Rule::unique('permissions')->ignore($permission->id)
                ]
            ]);

            $name = ucwords(strtolower($request->name)); // Mengubah nama permission menjadi format yang diinginkan
            $permission->update([
                'name' => $name
            ]);

            return Redirect::to('permissions')->with('success', 'Berhasil MengUpdate Data Permission!');
        } catch (ValidationException $e) {
            // Periksa apakah kesalahan berasal dari field 'name'
            if ($e->validator->errors()->has('name')) {
                return Redirect::back()
                    ->withErrors(['name' => 'Permission dengan nama ini sudah ada. Silakan gunakan nama lain.'])
                    ->withInput();
            }

            // Tangani validasi lainnya jika ada
            return Redirect::back()->withErrors($e->validator)->withInput();
        }
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return Redirect::to('permissions')->with('success', 'Berhasil Menghapus Data Permission!');
    }
}
