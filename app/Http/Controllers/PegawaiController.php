<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::withTrashed()->get();
        return view('hrd.pegawai', compact('pegawai'));
    }


    public function create()
    {
        return view('hrd.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:100|unique:pegawais,nama',
            'jabatan' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15|unique:pegawais,telepon',
            'email' => 'required|email|unique:pegawais,email',
            'tgl_masuk' => 'required|date',
            'gaji' => 'required|numeric|min:0',
        ], [
            'nama.required' => 'Nama pegawai wajib diisi.',
            'nama.unique' => 'Nama pegawai sudah terdaftar, tolong gunakan nama lain.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.unique' => 'Nomor telepon sudah digunakan pegawai lain.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'tgl_masuk.required' => 'Tanggal masuk wajib diisi.',
            'gaji.required' => 'Gaji wajib diisi.',
            'gaji.numeric' => 'Gaji harus berupa angka.',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('hrd.pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('hrd.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama'      => 'required|string|max:100|unique:pegawais,nama,' . $pegawai->id,
            'jabatan'   => 'required|string|max:100',
            'alamat'    => 'required|string|max:255',
            'telepon'   => 'required|string|max:15|unique:pegawais,telepon,' . $pegawai->id,
            'email'     => 'required|email|max:100|unique:pegawais,email,' . $pegawai->id,
            'tgl_masuk' => 'required|date',
            'gaji'      => 'required|numeric|min:0',
        ]);

        $pegawai->update($validated);

        return redirect()->route('hrd.pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('hrd.pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus.');
    }

    public function restore($id)
    {
        $pegawai = Pegawai::withTrashed()->findOrFail($id);
        $pegawai->restore();

        return redirect()->route('hrd.pegawai.index')
            ->with('success', 'Pegawai berhasil dikembalikan.');
    }
    public function trashed()
    {
        $pegawai = Pegawai::onlyTrashed()->get();
        return view('hrd.trashed', compact('pegawai'));
    }
}
