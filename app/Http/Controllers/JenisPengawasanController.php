<?php

namespace App\Http\Controllers;

use App\Models\JenisPengawasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JenisPengawasanController extends Controller
{

    public function index()
    {
        $jenis = JenisPengawasan::paginate(5);
        return view('JenisPengawasan.index', compact('jenis'));
    }


    public function create()
    {
        return view('JenisPengawasan.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|min:5|max:30',
            'nama' => 'required|string|min:5|max:30',
        ]);

        JenisPengawasan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        // return redirect()->back();
        return Redirect::to('/jenis-pengawasan');
    }


    public function show(JenisPengawasan $jenisPengawasan)
    {
        //
    }


    public function edit(String $id)
    {
        $jenis = JenisPengawasan::find($id);
        return view('JenisPengawasan.edit', compact('jenis'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'kode' => 'required|string|max:30',
            'nama' => 'required|string|max:100',
        ]);

        JenisPengawasan::where('id', $id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
    ]);

        return Redirect::to('/jenis-pengawasan');
    }

    public function destroy(String $id)
    {
        JenisPengawasan::where('id', $id)->delete();
        return redirect()->back();
    }

    public function list(Request $request)
    {
        $data = JenisPengawasan::query();

        if ($request->pageSize == "all") {
            return $this->returnJsonSuccess("Userlist retrieved successfully", $data->get());
        }

        $data = $data->paginate($request->pageSize ?? 1);

        return $this->returnJsonSuccess("Userlist retrieved successfully", $data);
    }
}
