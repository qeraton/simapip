<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Hash;
use Session;
use App\Models\{
    RPKH,
};
use Illuminate\Support\Facades\Auth;

class RPKHController extends Controller
{
    public function index()
    {
        // $RPKH = RPKH::paginate(3);
        $RPKH = RPKH::get();
        $total = RPKH::count();

        return view('RPKH.index', compact('RPKH', 'total'));
    }

    public function create()
    {
        return view('RPKH.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => 'required|string|max:225',
            'kartu_penugasan' => 'required|string|max:225',
            'hari' => 'required|string|max:225',
            'tanggal_pelaksanaan_kegiatan' => 'required|string|max:225',
            'rencana_kegiatan' => 'required|string|max:225',
            'tim' => 'required|string|max:225',
            'realisasi_kegiatan' => 'required|string|max:225',
            'keterangan' => 'nullable|string|max:225',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            RPKH::create([
                'nama_kegiatan' => $request->nama_kegiatan,
                'kartu_penugasan' => $request->kartu_penugasan,
                'hari' => $request->hari,
                'tanggal_pelaksanaan_kegiatan' => $request->tanggal_pelaksanaan_kegiatan,
                'rencana_kegiatan' => $request->rencana_kegiatan,
                'tim' => $request->tim,
                'realisasi_kegiatan' => $request->realisasi_kegiatan,
                'keterangan' => $request->keterangan,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);


            return Redirect::to('/RPKH')->with('success', 'Berhasil Menambah Data!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Menampilkan pesan error pada pengecualian
            return redirect()->back()->with('error', 'Gagal Menambahkan Data: ' . $e->getMessage());
        }
    }

}
