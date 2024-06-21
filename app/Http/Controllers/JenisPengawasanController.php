<?php

namespace App\Http\Controllers;

use App\Models\JenisPengawasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JenisPengawasanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Jenis Pengawasan', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create Jenis Pengawasan', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Jenis Pengawasan', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete Jenis Pengawasan', ['only' => ['destroy']]);
    }

    public function index()
    {
        $jenis = JenisPengawasan::get();
        return view('JenisPengawasan.index', compact('jenis'));
    }


    public function create()
    {
        return view('JenisPengawasan.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|min:5|max:30',
            'nama' => 'required|string|min:5|max:30',
        ]);

        try { 

            JenisPengawasan::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
            ]);

        return Redirect::to('/jenis-pengawasan')->with('success', 'Berhasil Menambah Data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Menambahkan Data: ' . $e->getMessage());
        }
    }


    public function show(JenisPengawasan $jenisPengawasan)
    {
        //
    }


    public function edit(String $id)
    {
        $jenis = JenisPengawasan::find($id);
        return view('JenisPengawasan.edit', compact('jenis'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'kode' => 'required|string|max:30',
            'nama' => 'required|string|max:100',
        ]);

        try{
            JenisPengawasan::where('id', $id)->update([
                'kode' => $request->kode,
                'nama' => $request->nama,
            ]);

        return Redirect::to('/jenis-pengawasan')->with('success', 'Berhasil Mengubah Data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Mengubah Data: ' . $e->getMessage());
        }
    }

    public function destroy(String $id)
    {
        JenisPengawasan::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    //  
}
