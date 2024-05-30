<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Session;
use App\Models\{
    Obyek,
    pangkat,
};
use Illuminate\Support\Facades\Auth;

class pangkatController extends Controller
{
    public function index()
    {
        $pangkat = pangkat::paginate(5);
        return view('pangkat.index', compact('pangkat'));
    }

    public function listPangkat(Request $request)
    {
        $data = pangkat::where(function ($q) use ($request) {
            if ($request->has('search') && $request->search != "") {
                $q->whereRaw('LOWER(nama) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                $q->orWhereRaw('LOWER(kode) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                $q->orWhereRaw('LOWER(golongan_kode) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
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
        return view('pangkat.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|numeric',
            'nama' => 'required|string|max:225',
            // 'golongan_kode' => 'required|string|max:10',
            'golongan_kode_kiri' => 'required|string|max:10',
            'golongan_kode_kanan' => 'required|string|max:10',
            'golongan' => 'required|numeric',
            'urutan' => 'required|numeric',

        ]);

        // Gabungkan kedua bagian menjadi satu kode
        $golongan_kode = $request->golongan_kode_kiri . '/' . $request->golongan_kode_kanan;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            
            pangkat::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'golongan_kode' => $golongan_kode,
                'golongan_kode_kiri' => $request->golongan_kode_kiri,
                'golongan_kode_kanan' => $request->golongan_kode_kanan,
                'golongan' => $request->golongan,
                'urutan' => $request->urutan,
            ]);


            return Redirect::to('/pangkat')->with('success', 'Berhasil Menambah data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Menambahkan Data: ' . $e->getMessage());
        }
    }


    public function show(pangkat $pangkatController)
    {
        //
    }


    public function edit(pangkat $pangkatEdit, $id)
    {
        $pangkatEdit = pangkat::find($id);
        //atau $jenjangJabatanEdit = jenjangJabatan::where('id', $id)->first();

        return view('pangkat.edit', compact('pangkatEdit'));
    }

    public function update(Request $request, pangkat $pangkatController, $id)
    {
        $request->validate([
            'kode' => 'numeric',
            'nama' => 'string|max:225',
            'golongan_kode_kiri' => 'max:10',
            'golongan_kode_kanan' => 'max:10',
            'golongan' => 'numeric',
            'urutan' => 'numeric',
        ]);

        // Ambil nilai asli golongan_kode dari database
        $pangkat = pangkat::findOrFail($id);
        $golongan_kode_asli = $pangkat->golongan_kode;

        // Gabungkan kedua bagian golongan_kode_kiri dan golongan_kode_kanan menjadi satu
        $golongan_kode = $request->golongan_kode_kiri . '/' . $request->golongan_kode_kanan;

        // Periksa apakah kedua input golongan_kode_kiri dan golongan_kode_kanan kosong
        if (empty($request->golongan_kode_kiri) || empty($request->golongan_kode_kanan)) {
            // Jika salah satu atau kedua input kosong, gunakan nilai asli dari golongan_kode
            $golongan_kode = $golongan_kode_asli;
        }

        pangkat::where('id', $id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'golongan_kode' => $golongan_kode,
            'golongan' => $request->golongan,
            'urutan' => $request->urutan,
        ]);

        return Redirect::to('/pangkat')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(pangkat $pangkatController, $id)
    {
        pangkat::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
