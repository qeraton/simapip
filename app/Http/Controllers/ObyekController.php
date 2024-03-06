<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Session;
use App\Models\{
    Obyek
};
use Illuminate\Support\Facades\Auth;


class ObyekController extends Controller
{
   
    public function index()
    {
        // $data = Obyek::all();

        return view('obyek.index');
    }

    public function listObyek(Request $request)
    {
        $data = Obyek::where(function ($q) use ($request) {
                if ($request->has('search') && $request->search != "") {
                    $q->whereRaw('LOWER(nama) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                    // $q->orWhereRaw('LOWER(email) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
                    // $q->orWhereRaw('LOWER(kode) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
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
        return view('obyek.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:100',
            'alamat' => 'required', 
            'no_telp' => 'required|min:10|unique:ref_obyek,no_telp',
            'email' => 'required|email|unique:ref_obyek,email',
            'website' => 'required',
            'pimpinan' => 'required',
        ], [
            'no_telp.unique' => 'Nomor Telephone Sudah Terdaftar / Tidak Valid.',
            'email.unique' => 'Email Sudah Terdaftar / Tidak Valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            Obyek::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'website' => $request->website,
                'pimpinan' => $request->pimpinan,
            ]);

            return redirect()->route('index')->with('success', 'Berhasil menambahkan data Obyek!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal menambahkan data Obyek: ' . $e->getMessage());
        }

    }

    
    public function show(ObyekController $obyekController)
    {
        //
    }

    
    public function edit(Obyek $obyekEdit, $id)
    {
        $obyekEdit = Obyek::find($id);
        //atau $medicine = Medicine::wehre('id', $id)->first();

        return view('obyek.edit', compact('obyekEdit'));
    }

    public function update(Request $request, ObyekController $obyekController, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:100',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'pimpinan' => 'required',
        ]);

        Obyek::where('id', $id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'website' => $request->website,
            'pimpinan' => $request->pimpinan,
        ]);

        return redirect()->route('index')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(Obyek $obyekController, $id)
    {
        Obyek::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
