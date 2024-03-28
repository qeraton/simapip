<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Session;
use App\Models\{
    Obyek,
    jenjangJabatan
};
use Illuminate\Support\Facades\Auth;

class JenjangJabatanController extends Controller
{

    public function index()
    {
        $jenJab = jenjangJabatan::paginate(5);
        return view('jenjangJabatan.index', compact('jenJab'));
    }

    public function listjenjangJabatan(Request $request)
    {
        $data = jenjangJabatan::where(function ($q) use ($request) {
            if ($request->has('search') && $request->search != "") {
                $q->whereRaw('LOWER(nama) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                $q->orWhereRaw('LOWER(kode) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                $q->orWhereRaw('LOWER(level) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
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
        return view('jenjangJabatan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ref_jabatan_id' => 'required|numeric',
            'kode' => 'required|string|max:3',
            'nama' => 'required|string|max:225',
            'level' => 'required|numeric'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            jenjangJabatan::create([
                'ref_jabatan_id' => $request->ref_jabatan_id,
                'kode' => $request->kode,
                'nama' => $request->nama,
                'level' => $request->level,
                
            ]);

            return Redirect::to('/jenjangJabatan')->with('success', 'Berhasil mengubah data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Menambahkan Data: ' . $e->getMessage());
        }
    }


    public function show(ObyekController $obyekController)
    {
        //
    }


    public function edit(jenjangJabatan $jenjangJabatanEdit, $id)
    {
        $jenjangJabatanEdit = jenjangJabatan::find($id);
        //atau $jenjangJabatanEdit = jenjangJabatan::where('id', $id)->first();

        return view('jenjangJabatan.edit', compact('jenjangJabatanEdit'));
    }

    public function update(Request $request, jenjangJabatanController $JenjangJabatanController, $id)
    {
        $request->validate([
            'ref_jabatan_id' => 'required|numeric',
            'kode' => 'required|string|max:3',
            'nama' => 'required|string|max:225',
            'level' => 'required|numeric'

        ]);

        jenjangJabatan::where('id', $id)->update([
            'ref_jabatan_id' => $request->ref_jabatan_id,
            'kode' => $request->kode,
            'nama' => $request->nama,
            'level' => $request->level,
            
        ]);

        return Redirect::to('/jenjangJabatan')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(jenjangJabatan $jenjangJabatanController, $id)
    {
        jenjangJabatan::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
