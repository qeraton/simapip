<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\{
    User,
};
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Menampilkan form perubahan password.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware('permission:View User', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create User', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit User', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete User', ['only' => ['destroy']]);
    }
    public function index() 
    { 
        $users = User::get();
        return view('role-permission.user.index', [
            'users' => $users,
        ]);
    }

    public function create() 
    {
        $roles = Role::pluck('name', 'name')->all();
        return view(
        'role-permission.user.create', [
            'roles' => $roles,
        ]);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect('/users')->with('success', 'User Berhasil DiBuat Dengan Role!');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);

    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required',
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('success', 'Berhasil Update Data User!');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/users')->with('success', 'Berhasil MenDelete Data User!');
    }

    public function showChangePasswordForm()
    {
        return view('Users.change-password');
    }

    /**
     * Memproses perubahan password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::User();

        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Password saat ini tidak sesuai.'],
            ]);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('dashboard')->with('success', 'Kata sandi berhasil diperbarui.');
    }
}
