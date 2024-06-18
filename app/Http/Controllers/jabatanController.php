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

class jabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Jabatan', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create Jabatan', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Jabatan', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete Jabatan', ['only' => ['destroy']]);
    }
    public function index()
    {
        $jabatan = jabatan::get();
        $total = jabatan::count();

        return view('jabatan.index', compact('jabatan', 'total'));
    }

    public function listJabatan(Request $request)
    {
        $data = jabatan::where(function ($q) use ($request) {
            if ($request->has('search') && $request->search != "") {
                $q->whereRaw('LOWER(nama) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                $q->orWhereRaw('LOWER(kode) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                $q->orWhereRaw('LOWER(kelompok_jabatan) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
            }
        })
            ->when($request->has('ja') && $request->ja != "all" && !empty($request->ja), function ($q) use ($request) {
                if ($request->ja == "NOA") {
                    $q->whereNull('kode');
                } else
                    $q->where('kode', $request->ja);
            })
            ->paginate($request->pageSize);

        return $this->returnJsonSuccess("Userlist retrieved successfully", $data);
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:2',
            'nama' => 'required|string|max:225',
            'deskripsi' => 'required|string|max:225',
            'kelompok_jabatan' => 'required|string|max:3',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            jabatan::create([
                
                'kode' => $request->kode,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kelompok_jabatan' => $request->kelompok_jabatan,

            ]);

            return Redirect::to('/jabatan')->with('success', 'Berhasil mengubah data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Menambahkan Data: ' . $e->getMessage());
        }
    }


    public function show(jabatan $jabatanController)
    {
        //
    }


    public function edit(jabatan $jabatanEdit, $id)
    {
        $jabatanEdit = jabatan::find($id);
        //atau $jenjangJabatanEdit = jenjangJabatan::where('id', $id)->first();

        return view('jabatan.edit', compact('jabatanEdit'));
    }

    public function update(Request $request, jabatan $jabatanController, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:2',
            'nama' => 'required|string|max:225',
            'deskripsi' => 'required|string|max:225',
            'kelompok_jabatan' => 'required|string|max:3'
        ]);

        jabatan::where('id', $id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kelompok_jabatan' => $request->kelompok_jabatan,
        ]);

        return Redirect::to('/jabatan')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(jabatan $jabatanController, $id)
    {
        jabatan::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
