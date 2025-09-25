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

        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:pegawais,email',
            'tgl_masuk' => 'required|date',
            'gaji' => 'required|numeric|min:0',
        ], [
            'nama.required' => 'Nama pegawai wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'tgl_masuk.required' => 'Tanggal masuk wajib diisi.',
            'gaji.required' => 'Gaji wajib diisi.',
            'gaji.numeric' => 'Gaji harus berupa angka.',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('hrd.pegawai')->with('success', 'Data pegawai berhasil ditambahkan!');
    }
}
