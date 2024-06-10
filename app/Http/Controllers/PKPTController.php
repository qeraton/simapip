<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Session;
use App\Models\{
    Obyek,
    PKPT,
};
use Illuminate\Support\Facades\Auth;

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

    // public function listPangkat(Request $request)
    // {
    //     $data = PKPT::where(function ($q) use ($request) {
    //         if ($request->has('search') && $request->search != "") {
    //             $q->whereRaw('LOWER(nama) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
    //             $q->orWhereRaw('LOWER(kode) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
    //             $q->orWhereRaw('LOWER(jenis) LIKE ?', ['%' . trim(strtolower($request->search)) . '%']);
    //         }
    //     })
    //         ->when($request->has('ja') && $request->ja != "all" && !empty($request->ja), function ($q) use ($request) {
    //             if ($request->ja == "NOA") {
    //                 $q->whereNull('kode');
    //             } else
    //                 $q->where('kode', $request->ja);
    //         })
    //         ->paginate($request->pageSize);

    //     return $this->returnJsonSuccess("Userlist retrieved successfully", $data);
    // }

    public function create()
    {
        return view('PKPT.create');
    }

    public function createnyoba()
    {
        return view('PKPT.createnyoba');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:225',
            'jenis' => 'required|string|max:225',
            'unit' => 'required|string|max:225',
            'tujuan_audit' => 'required|string|max:225',
            'ruang_lingkup' => 'required|string|max:4',
            // 'susunan_tim' => 'required|string|max:225',
            'pj' => 'required|numeric',
            'pt_wpj' => 'required|numeric',
            'kt' => 'required|numeric',
            'at' => 'required|numeric',
            'waktu_dk' => 'nullable|numeric',
            'waktu_lk' => 'nullable|numeric',
            'waktu_hp' => 'nullable|numeric',
            'biaya_dk' => 'nullable|numeric',
            'biaya_lk' => 'nullable|numeric',
            // 'total' => 'required|numeric',
            'rmp' => 'required|numeric',
            'rpl' => 'required|numeric',
            'lha' => 'required|numeric',
            'peralatan' => 'required|string|max:225',
            'keterangan' => 'nullable|string|max:225',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Gabungkan nilai dari 'pj', 'pt_wpj', 'kt', dan 'at' ke dalam 'susunan_tim' dengan format yang diinginkan
        $susunanTim = $request->input('pj') . ' PJ, ' . $request->input('pt_wpj') . ' PT/WPJ, ' . $request->input('kt') . ' KT, ' . $request->input('at') . ' AT';

        $data = $request->only(['kode', 'nama', 'jenis', 'unit', 'pj', 'pt_wpj', 'kt', 'at','tujuan_audit', 'ruang_lingkup', 'rmp', 'rpl', 'lha', 'peralatan']);

        // Tambahkan 'susunan_tim' ke dalam data
        $data['susunan_tim'] = $susunanTim;

        // $data = $request->only(['kode', 'nama', 'jenis', 'unit' ,'tujuan_audit', 'ruang_lingkup', 'pj', 'pt_wpj', 'kt', 'at' ,'susunan_tim', 'rmp', 'rpl', 'lha', 'peralatan']);

        // Handling waktu_dk
        if ($request->filled('waktu_dk')) {
            $data['waktu_dk'] = $request->waktu_dk;
        } else {
            $data['waktu_dk'] = 0; // Atau nilai default lainnya sesuai kebutuhan
        }

        // Handling waktu_hp
        if ($request->filled('waktu_hp')) {
            $data['waktu_hp'] = $request->waktu_hp;
        } else {
            $data['waktu_hp'] = 0; // Atau nilai default lainnya sesuai kebutuhan
        }

        // Handling biaya_dk
        if ($request->filled('biaya_dk')) {
            $data['biaya_dk'] = $request->biaya_dk;
        } else {
            $data['biaya_dk'] = 0; // Atau nilai default lainnya sesuai kebutuhan
        }

        // Handling biaya_lk
        if ($request->filled('biaya_lk')) {
            $data['biaya_lk'] = $request->biaya_lk;
        } else {
            $data['biaya_lk'] = 0; // Atau nilai default lainnya sesuai kebutuhan
        }

        // Handling keterangan
        $data['keterangan'] = $request->keterangan ?? ''; // Menggunakan null coalescing operator untuk nilai default kosong jika tidak ada input

        try {
            PKPT::create($data);
            return Redirect::to('/PKPT')->with('success', 'Berhasil Menambahkan data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
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
        //atau $jenjangJabatanEdit = jenjangJabatan::where('id', $id)->first();

        return view('PKPT.edit', compact('PKPTEdit'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:225',
            'jenis' => 'required|string|max:225',
            'unit' => 'required|string|max:225',
            'tujuan_audit' => 'required|string|max:225',
            'ruang_lingkup' => 'required|string|max:4',
            // 'susunan_tim' => 'required|string|max:225',
            'pj' => 'required|numeric',
            'pt_wpj' => 'required|numeric',
            'kt' => 'required|numeric',
            'at' => 'required|numeric',
            'waktu_dk' => 'nullable|numeric',
            'waktu_lk' => 'nullable|numeric',
            'waktu_hp' => 'nullable|numeric',
            'biaya_dk' => 'nullable|numeric',
            'biaya_lk' => 'nullable|numeric',
            // 'total' => 'required|numeric',
            'rmp' => 'required|numeric',
            'rpl' => 'required|numeric',
            'lha' => 'required|numeric',
            'peralatan' => 'required|string|max:225',
            'keterangan' => 'nullable|string|max:225',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Gabungkan nilai dari 'pj', 'pt_wpj', 'kt', dan 'at' ke dalam 'susunan_tim' dengan format yang diinginkan
        $susunanTim = $request->input('pj') . ' PJ, ' . $request->input('pt_wpj') . ' PT/WPJ, ' . $request->input('kt') . ' KT, ' . $request->input('at') . ' AT';

        $data = $request->only(['kode', 'nama', 'jenis', 'unit', 'pj', 'pt_wpj', 'kt', 'at', 'tujuan_audit', 'ruang_lingkup', 'rmp', 'rpl', 'lha', 'peralatan']);

        // Tambahkan 'susunan_tim' ke dalam data
        $data['susunan_tim'] = $susunanTim;

        // Handling waktu_dk
        if ($request->filled('waktu_dk')) {
            $data['waktu_dk'] = $request->waktu_dk;
        } else {
            $data['waktu_dk'] = 0; // Atau nilai default lainnya sesuai kebutuhan
        }

        // Handling waktu_lk
        if ($request->filled('waktu_lk')) {
            $data['waktu_lk'] = $request->waktu_lk;
        } else {
            $data['waktu_lk'] = 0; // Atau nilai default lainnya sesuai kebutuhan
        }

        // Handling waktu_hp
        if ($request->filled('waktu_hp')) {
            $data['waktu_hp'] = $request->waktu_hp;
        } else {
            $data['waktu_hp'] = 0; // Atau nilai default lainnya sesuai kebutuhan
        }

        // Handling biaya_dk
        if ($request->filled('biaya_dk')) {
            $data['biaya_dk'] = $request->biaya_dk;
        } else {
            $data['biaya_dk'] = 0; // Atau nilai default lainnya sesuai kebutuhan
        }

        // Handling biaya_lk
        if ($request->filled('biaya_lk')) {
            $data['biaya_lk'] = $request->biaya_lk;
        } else {
            $data['biaya_lk'] = 0; // Atau nilai default lainnya sesuai kebutuhan
        }

        // Handling keterangan
        $data['keterangan'] = $request->keterangan ?? ''; // Menggunakan null coalescing operator untuk nilai default kosong jika tidak ada input

        try {
            PKPT::where('id', $id)->update($data);
            return Redirect::to('/PKPT')->with('success', 'Berhasil mengubah data!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }


    public function destroy(PKPT $PKPTController, $id)
    {
        PKPT::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
