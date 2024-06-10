<?php

namespace App\Http\Controllers;

use App\Models\StrataPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StrataPendidikanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Strata Pendidikan', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create Strata Pendidikan', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Strata Pendidikan', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete Strata Pendidikan', ['only' => ['destroy']]);
    }

    public function index()
    {
        $pendidikan = StrataPendidikan::get();
        return view('StrataPendidikan.index', compact('pendidikan'));
    }

    public function create()
    {
        return view('StrataPendidikan.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|min:5|max:30',
        ]);

        $jumlahData = StrataPendidikan::count();
        $sortLevel = $jumlahData + 1;
    
        StrataPendidikan::create([
            'nama' => $request->nama,
            'sort_level' => $sortLevel,
        ]);

        return Redirect::to('/strata-pendidikan')->with('success', 'Berhasil Menambah Data!');;
    }

    public function show(StrataPendidikan $strataPendidikan)
    {
        //
    }

    public function edit(String $id)
    {
        $pendidikan = StrataPendidikan::find($id);
        return view('StrataPendidikan.edit', compact('pendidikan'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
        ]);

        StrataPendidikan::where('id', $id)->update([
            'nama' => $request->nama,
    ]);

        return Redirect::to('/strata-pendidikan');
    }

    public function destroy(String $id)
    {
        StrataPendidikan::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
