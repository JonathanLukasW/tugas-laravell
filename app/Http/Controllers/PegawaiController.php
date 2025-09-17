<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all(); 
        return view('hrd.pegawai', compact('pegawai'));
    }

    public function create()
    {
        return view('hrd.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Pegawai::create($request->all());
        return redirect()->route('hrd.pegawai');
    }
}
