<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Hash;
use Session;
use App\Models\{
    Reviu,
};
use Illuminate\Support\Facades\Auth;

class ReviuController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Reviu', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create Reviu', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Reviu', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete Reviu', ['only' => ['destroy']]);
    }
    public function index()
    {
        
        $Reviu = Reviu::get();
        $total = Reviu::count();

        return view('Reviu.index', compact('Reviu', 'total'));
    }

    public function create()
    {
        return view('Reviu.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            Reviu::create([
               
            ]);


            return Redirect::to('/Reviu')->with('success', 'Berhasil Menambah Data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Menambahkan Data: ' . $e->getMessage());
        }
    }

    public function edit(Reviu $Reviu, $id)
    {
        $ReviuEdit = Reviu::find($id);
        return view('Reviu.edit', compact('ReviuEdit'));
    }

    public function update(Request $request, Reviu $ReviuController, $id)
    {
        $validator = Validator::make($request->all(), [
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            Reviu::where('id', $id)->update([
                
            ]);

            return Redirect::to('/Reviu')->with('success', 'Berhasil Mengubah Data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Mengubah Data: ' . $e->getMessage());
        }
    }

    public function destroy(Reviu $ReviuController, $id)
    {
        Reviu::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
