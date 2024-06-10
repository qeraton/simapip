<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    //
    private $viewBasePath = 'Penugasan';

    // public function __construct()
    // {
    //     $this->middleware('permission:View Penugasan Saya', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:Create Daftar-Unit-Kerja', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:Edit Daftar-Unit-Kerja', ['only' => ['update', 'edit']]);
    //     $this->middleware('permission:Delete Daftar-Unit-Kerja', ['only' => ['destroy']]);
    // }
    public function index()
    {
        return view($this->viewBasePath . '/index');
    }
}
