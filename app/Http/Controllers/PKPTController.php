<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Session;
use App\Models\{
    UnitKerja,
    PKPT,
    JenisPengawasan
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PKPTController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View PKPT', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create PKPT', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit PKPT', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete PKPT', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $PKPT = PKPT::get();
        $total = PKPT::count();

        return view('PKPT.index', compact('PKPT', 'total'));
    }
    public function ref_index(){
        $PKPT = PKPT::get();
        return view('PKPT.ref-PKPT', compact('PKPT'));
    }

    public function getUnitKerja()
    {
        $units = DB::table('unit_kerja')->select('id', 'nama_unit')->get(); 
        return response()->json($units);
    }

    public function create()
    {
        $units = DB::table('unit_kerja')->select('id', 'nama_unit')->get();
        $jenisPengawasan = DB::table('ref_jenis_pengawasan')->select('id', 'nama')->get();
        return view('PKPT.create', compact('units', 'jenisPengawasan'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:225',
            'jenis' => 'required|exists:ref_jenis_pengawasan,id',
            'unit' => 'required|exists:unit_kerja,id',
            'tujuan_audit' => 'required|string|max:225',
            'ruang_lingkup' => 'required|string|max:4',
            'pj' => 'required|numeric',
            'pt_wpj' => 'required|numeric',
            'kt' => 'required|numeric',
            'at' => 'required|numeric',
            'waktu_dk' => 'nullable|numeric',
            'waktu_lk' => 'nullable|numeric',
            'waktu_hp' => 'nullable|numeric',
            'biaya_dk' => 'nullable|numeric',
            'biaya_lk' => 'nullable|numeric',
            'rmp' => 'required|numeric',
            'rpl' => 'required|numeric',
            'lha' => 'required|numeric',
            'peralatan' => 'required|string|max:225',
            'keterangan' => 'nullable|string|max:225',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Fetch the unit name based on the ID
        $unit = UnitKerja::findOrFail($request->unit);
        $unit_name = $unit->nama_unit;

        // Fetch the jenis pengawasan name based on the ID
        $jenisPengawasan = JenisPengawasan::findOrFail($request->jenis);
        $jenis_name = $jenisPengawasan->nama;

        // Prepare the 'susunan_tim' value
        $susunanTim = $request->input('pj') . ' PJ, ' . $request->input('pt_wpj') . ' PT/WPJ, ' . $request->input('kt') . ' KT, ' . $request->input('at') . ' AT';

        // Prepare the data array for saving
        // $data = $request->only(['kode', 'nama', 'tujuan_audit', 'ruang_lingkup', 'rmp', 'rpl', 'lha', 'peralatan']);
        $data = $request->only(['kode', 'nama', 'tujuan_audit', 'pj', 'pt_wpj', 'kt', 'at', 'ruang_lingkup', 'rmp', 'rpl', 'lha', 'peralatan']);
        $data['unit'] = $unit_name; // Use the unit name instead of the ID
        $data['jenis'] = $jenis_name; // Use the jenis pengawasan name instead of the ID
        $data['susunan_tim'] = $susunanTim;
        $data['waktu_dk'] = $request->filled('waktu_dk') ? $request->waktu_dk : 0;
        $data['waktu_lk'] = $request->filled('waktu_lk') ? $request->waktu_lk : 0;
        $data['waktu_hp'] = $request->filled('waktu_hp') ? $request->waktu_hp : 0;
        $data['biaya_dk'] = $request->filled('biaya_dk') ? $request->biaya_dk : 0;
        $data['biaya_lk'] = $request->filled('biaya_lk') ? $request->biaya_lk : 0;
        $data['keterangan'] = $request->keterangan ?? '';

        try {
            PKPT::create($data);
            return Redirect::to('/PKPT')->with('success', 'Berhasil Menambahkan Data!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Menambahkan Data: ' . $e->getMessage());
        }
    }


    public function show(PKPT $PKPTController)
    {
        //
    }


    public function edit(PKPT $PKPTEdit, $id)
    {
        $PKPTEdit = PKPT::find($id);
        $units = DB::table('unit_kerja')->select('id', 'nama_unit')->get();
        $jenisPengawasan = DB::table('ref_jenis_pengawasan')->select('id', 'nama')->get();
        return view('PKPT.edit', compact('PKPTEdit', 'units', 'jenisPengawasan'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:225',
            'jenis' => 'required|exists:ref_jenis_pengawasan,id',
            'unit' => 'required|exists:unit_kerja,id',
            'tujuan_audit' => 'required|string|max:225',
            'ruang_lingkup' => 'required|string|max:4',
            'pj' => 'required|numeric',
            'pt_wpj' => 'required|numeric',
            'kt' => 'required|numeric',
            'at' => 'required|numeric',
            'waktu_dk' => 'nullable|numeric',
            'waktu_lk' => 'nullable|numeric',
            'waktu_hp' => 'nullable|numeric',
            'biaya_dk' => 'nullable|numeric',
            'biaya_lk' => 'nullable|numeric',
            'rmp' => 'required|numeric',
            'rpl' => 'required|numeric',
            'lha' => 'required|numeric',
            'peralatan' => 'required|string|max:225',
            'keterangan' => 'nullable|string|max:225',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Fetch the unit name based on the ID
        $unit = UnitKerja::findOrFail($request->unit);
        $unit_name = $unit->nama_unit;

        // Fetch the jenis pengawasan name based on the ID
        $jenisPengawasan = JenisPengawasan::findOrFail($request->jenis);
        $jenis_name = $jenisPengawasan->nama;

        // Prepare the 'susunan_tim' value
        $susunanTim = $request->input('pj') . ' PJ, ' . $request->input('pt_wpj') . ' PT/WPJ, ' . $request->input('kt') . ' KT, ' . $request->input('at') . ' AT';

        // Prepare the data array for updating
        $data = $request->only(['kode', 'nama', 'tujuan_audit', 'pj', 'pt_wpj', 'kt', 'at', 'ruang_lingkup', 'rmp', 'rpl', 'lha', 'peralatan']);
        $data['unit'] = $unit_name; // Use the unit name instead of the ID
        $data['jenis'] = $jenis_name; // Use the jenis pengawasan name instead of the ID
        $data['susunan_tim'] = $susunanTim;
        $data['waktu_dk'] = $request->filled('waktu_dk') ? $request->waktu_dk : 0;
        $data['waktu_lk'] = $request->filled('waktu_lk') ? $request->waktu_lk : 0;
        $data['waktu_hp'] = $request->filled('waktu_hp') ? $request->waktu_hp : 0;
        $data['biaya_dk'] = $request->filled('biaya_dk') ? $request->biaya_dk : 0;
        $data['biaya_lk'] = $request->filled('biaya_lk') ? $request->biaya_lk : 0;
        $data['keterangan'] = $request->keterangan ?? '';

        try {
            $pkpt = PKPT::findOrFail($id);
            $pkpt->update($data);
            return Redirect::to('/PKPT')->with('success', 'Berhasil Memperbarui data!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Memperbarui Data: ' . $e->getMessage());
        }
    }



    public function destroy(PKPT $PKPTController, $id)
    {
        PKPT::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
