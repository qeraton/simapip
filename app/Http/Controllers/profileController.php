<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\profile;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            return Redirect::to('/my-profile')->with('success', 'Login Berhasil!');
        } else {
            return redirect()->back()->with('failed', 'proses login gagal, silahkan coba kembali dengan data yang benar!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/logout')->with('logout', 'telah Logout!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = array(
            'cover_image' => 'assets/img/profile-cover.png',
            'bio' => 'Autoglyphs are fitting the first “on-chain” to the find generative art on the Ethereum blockchain',
        );
        
        $user = profile::all();
        $foto = profile::where('id', Auth::user()->id)->first();
        return view('my-profile.index', compact('user', 'User', 'foto'));
    }

    public function edit(profile $profile, $id)
    {
        $user = profile::find($id);
        return view('my-profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = profile::find($id);

        if (!$user) {
            return Redirect::to('/my-profile')->with('error', 'Akun Tidak Ditemukan!');
        }

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,

        ]);

        if ($request->password) {
            // $password = substr($request->email, 0, 3).substr($request->name, 0, 3);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        return Redirect::to('/my-profile')->with('success', 'Akun diperbaharui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        profile::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil Menghapus Data!');
    }
}
