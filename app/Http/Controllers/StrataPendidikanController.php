<?php

namespace App\Http\Controllers;

use App\Models\StrataPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StrataPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikan = StrataPendidikan::paginate(5);
        return view('StrataPendidikan.index', compact('pendidikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('StrataPendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return Redirect::to('/strata-pendidikan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StrataPendidikan  $strataPendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(StrataPendidikan $strataPendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StrataPendidikan  $strataPendidikan
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->back();
    }
}
