<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarPenugasan;
use Illuminate\Support\Facades\Redirect;

class DaftarPenugasanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:View Daftar Penugasan', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create Daftar Penugasan', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Daftar Penugasan', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete Daftar Penugasan', ['only' => ['destroy']]);
    }

    public function index()
    {
        $daftarPenugasan = DaftarPenugasan::get();
        return view('DaftarPenugasan.index', compact('daftarPenugasan'));
    }

    public function create()
    {
        return view('DaftarPenugasan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penugasan' => 'required',
            'deskripsi_penugasan' => '',
        ]);

        try { 

            DaftarPenugasan::create([
                'nama_penugasan' => $request->nama_penugasan,
                'deskripsi_penugasan' => $request->deskripsi_penugasan,
            ]);

        return Redirect::to('/daftar-penugasan')->with('success', 'Berhasil Menambah Data!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Gagal Menambahkan Data: ' . $e->getMessage());
        }
    }

    public function edit(String $id)
    {
        $daftar = DaftarPenugasan::find($id);
        return view('DaftarPenugasan.edit', compact('daftar'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama_penugasan' => 'required',
            'deskripsi_penugasan' => '',
        ]);

        try{
            DaftarPenugasan::where('id', $id)->update([
                'nama_penugasan' => $request->nama_penugasan,
                'deskripsi_penugasan' => $request->deskripsi_penugasan,
            ]);

        return Redirect::to('/daftar-penugasan')->with('success', 'Berhasil Mengubah Data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Mengubah Data: ' . $e->getMessage());
        }
    }

    public function destroy(String $id)
    {
        DaftarPenugasan::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function list(Request $request)
    {
        $data = DaftarPenugasan::query();

        if ($request->pageSize == "all") {
            return $this->returnJsonSuccess("Userlist retrieved successfully", $data->get());
        }

        $data = $data->paginate($request->pageSize ?? 1);

        return $this->returnJsonSuccess("Userlist retrieved successfully", $data);
    }
}
