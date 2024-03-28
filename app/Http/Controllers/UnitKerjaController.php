<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitKerja = UnitKerja::paginate(10);
        return view('DataUnitKerja.index', compact('unitKerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DataUnitKerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama_unit' => 'required',
            'nama_singkatan' => 'nullable',
            'alamat' => 'nullable',
            'pimpinan' => 'nullable',
            'no_telp' => 'nullable|digits_between:10,15',
            'email' => 'nullable|email',
            'website' => 'nullable|regex:/^https:\/\/.*/',
            'nomor_urut' => 'required|max:3',
            'unitKerja_Kode' => 'required|min:9|max:14',
        ], [
            'kode.required' => 'Kode unit kerja wajib diisi.',
            'nama_unit.required' => 'Kode unit kerja wajib diisi.',
            'nomor_urut.required' => 'Kode unit kerja wajib diisi.',
            'nomor_urut.max' => 'Nomor surat maksimal 3 nomor.',
            'unitKerja_Kode.required' => 'Kode unit kerja wajib diisi.',
            'unitKerja_Kode.min' => 'Kode unit kerja minimal 9 angka.',
            'unitKerja_Kode.max' => 'Kode unit kerja maksimal 14 angka.',
            'email.email' => 'Format email tidak valid.',
            'website.regex' => 'Format website tidak valid. Pastikan website dimulai dengan https://',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        UnitKerja::create([
            'kode_unit_kerja' => $request->kode,
            'nama_unit' => $request->nama_unit,
            'nama_singkatan' => $request->nama,
            'alamat' => $request->alamat,
            'pimpinan' => $request->pimpinan,
            'nomor_telepon' => $request->no_telp,
            'email' => $request->email,
            'website' => $request->website,
            'nomor_urut' => $request->nomor_urut,
            'UnitKerja_Kode' => $request->unitKerja_Kode,
        ]);
        
        $success = 'Data unit kerja berhasil ditambahkan.';

        return Redirect::to('/unit-kerja')->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function show(UnitKerja $unitKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(String $id)
    {
        $unitKerja = UnitKerja::find($id);
        return view('DataUnitKerja.edit', compact('unitKerja'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama_unit' => 'required',
            'nama_singkatan' => 'nullable',
            'alamat' => 'nullable',
            'pimpinan' => 'nullable',
            'no_telp' => 'nullable|digits_between:10,15',
            'email' => 'nullable|email',
            'website' => 'nullable|regex:/^https:\/\/.*/',
            'nomor_urut' => 'required|max:3',
            'unitKerja_Kode' => 'required|min:9|max:14',
        ], [
            'kode.required' => 'Kode unit kerja wajib diisi.',
            'nama_unit.required' => 'Kode unit kerja wajib diisi.',
            'nomor_urut.required' => 'Kode unit kerja wajib diisi.',
            'nomor_urut.max' => 'Nomor surat maksimal 3 nomor.',
            'unitKerja_Kode.required' => 'Kode unit kerja wajib diisi.',
            'unitKerja_Kode.min' => 'Kode unit kerja minimal 9 angka.',
            'unitKerja_Kode.max' => 'Kode unit kerja maksimal 14 angka.',
            'email.email' => 'Format email tidak valid.',
            'website.regex' => 'Format website tidak valid. Pastikan website dimulai dengan https://',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        UnitKerja::where('id', $id)->update([
            'kode_unit_kerja' => $request->kode,
            'nama_unit' => $request->nama_unit,
            'nama_singkatan' => $request->nama,
            'alamat' => $request->alamat,
            'pimpinan' => $request->pimpinan,
            'nomor_telepon' => $request->no_telp,
            'email' => $request->email,
            'website' => $request->website,
            'nomor_urut' => $request->nomor_urut,
            'UnitKerja_Kode' => $request->unitKerja_Kode,
        ]);
        
        $success = 'Data unit kerja berhasil diubah.';

        return Redirect::to('/unit-kerja')->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        UnitKerja::where('id', $id)->delete();
        return redirect()->back();
    }
}
