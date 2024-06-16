<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Hash;
use Session;
use App\Models\{
    KartuPenugasan,
};
use Illuminate\Support\Facades\Auth;

class KartuPenugasanController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:View Kartu-Penugasan', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:Create Kartu-Penugasan', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:Edit Kartu-Penugasan', ['only' => ['update', 'edit']]);
    //     $this->middleware('permission:Delete Kartu-Penugasan', ['only' => ['destroy']]);
    // }
    public function index()
    {
        $KartuPenugasan = KartuPenugasan::get();
        $total = KartuPenugasan::count();

        return view('KartuPenugasan.index', compact('KartuPenugasan', 'total'));
    }

    public function create()
    {
        return view('KartuPenugasan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            KartuPenugasan::create([

            ]);


            return Redirect::to('/KartuPenugasan')->with('success', 'Berhasil Menambah Data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Menambahkan Data: ' . $e->getMessage());
        }
    }

    public function edit(KartuPenugasan $KartuPenugasan, $id)
    {
        $KartuPenugasanEdit = KartuPenugasan::find($id);
        return view('KartuPenugasan.edit', compact('KartuPenugasanEdit'));
    }

    public function update(Request $request, KartuPenugasan $KartuPenugasanController, $id)
    {
        $validator = Validator::make($request->all(), [

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            KartuPenugasan::where('id', $id)->update([

            ]);

            return Redirect::to('/KartuPenugasan')->with('success', 'Berhasil Mengubah Data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Mengubah Data: ' . $e->getMessage());
        }
    }

    public function destroy(KartuPenugasan $KartuPenugasanController, $id)
    {
        KartuPenugasan::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
