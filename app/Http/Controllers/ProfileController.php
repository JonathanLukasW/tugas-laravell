<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            // Email tidak perlu divalidasi 'unique' karena readonly di View
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user->name = $request->name;
        // $user->email tidak perlu diupdate karena sudah readonly
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->save(); 

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
    
    // Metode ini yang harus ada untuk mengatasi error 'updatePassword does not exist'
    public function updatePassword(Request $request) 
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        // Cek apakah password lama cocok
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi lama salah.'])->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Kata sandi berhasil diperbarui!');
    }
}