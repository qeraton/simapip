<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\{
    User,
    Pegawai
};
use App\Models\Views\{
    VPegawai
};
use Illuminate\Support\Facades\Auth;

class DataPegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Data Pegawai', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create Data Pegawai', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Data Pegawai', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete Data Pegawai', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('DataPegawai.index');
    }

    public function listPegawai(Request $request)
    {
        $data = VPegawai::
        where(function($q) use($request){
            if($request->has('search') && $request->search != ""){
                $q->whereRaw('LOWER(nama_lengkap) LIKE ?', ['%'.trim(strtolower($request->search)).'%']);
                $q->orWhereRaw('LOWER(nip) LIKE ?', ['%'.trim(strtolower($request->search)).'%']);
            }
        })
        ->when($request->has('ja') && $request->ja != "all" && !empty($request->ja), function($q) use($request){
            if($request->ja == "NOA"){
                $q->whereNull('jabatan_kode');
            }
            else
                $q->where('jabatan_kode', $request->ja);
        });

        if ($request->pageSize == "all") {
            return $this->returnJsonSuccess("Userlist retrieved successfully", $data->get());
        }

        $data = $data->paginate($request->pageSize ?? 10);

        return $this->returnJsonSuccess("Userlist retrieved successfully", $data);
    }

    public function profilePegawai($id)
    {
        $data = VPegawai::find($id);

        return view('DataPegawai.profile', compact('data'));
    }
}
