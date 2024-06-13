<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarPenugasan;

class DaftarPenugasanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:View Daftar Penugasan', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create Daftar Penugasan', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Daftar Penugasan', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Delete Daftar Penugasan', ['only' => ['destroy']]);
    }

    public function index()
    {
        $daftarPenugasan = DaftarPenugasan::get();
        return view('DaftarPenugasan.index', compact('daftarPenugasan'));
    }
}
