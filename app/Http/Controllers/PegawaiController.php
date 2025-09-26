<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ], [
            'nama.required' => 'Nama pegawai wajib diisi.',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['photo_path'] = $file->storeAs('public/pegawai-photos', $filename); 
        } else {
            $data['photo_path'] = null;
        }

        Pegawai::create($data);

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

        $request->validate([
            'nama'      => 'required|string|max:100|unique:pegawais,nama,' . $pegawai->id,
            'jabatan'   => 'required|string|max:100',
            'alamat'    => 'required|string|max:255',
            'telepon'   => 'required|string|max:15|unique:pegawais,telepon,' . $pegawai->id,
            'email'     => 'required|email|max:100|unique:pegawais,email,' . $pegawai->id,
            'tgl_masuk' => 'required|date',
            'gaji'      => 'required|numeric|min:0',
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        
        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            if ($pegawai->photo_path) {
                Storage::delete($pegawai->photo_path);
            }
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['photo_path'] = $file->storeAs('public/pegawai-photos', $filename);
        } else {
             $data['photo_path'] = $pegawai->photo_path;
        }
        
        $pegawai->update($data);

        return redirect()->route('hrd.pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        
        if ($pegawai->photo_path) {
            Storage::delete($pegawai->photo_path);
        }

        $pegawai->delete();

        return redirect()->route('hrd.pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }

    public function restore($id)
    {
        $pegawai = Pegawai::withTrashed()->findOrFail($id);
        $pegawai->restore();
        return redirect()->route('hrd.pegawai.index')->with('success', 'Pegawai berhasil dikembalikan.');
    }
    
    public function trashed()
    {
        $pegawai = Pegawai::onlyTrashed()->get();
        return view('hrd.trashed', compact('pegawai'));
    }
}