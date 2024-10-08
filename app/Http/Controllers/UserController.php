<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function profil () {
        $user = Auth::user();
        return view('user.profil', compact('user'));
    }

    public function profilUpdate (Request $request) {
        $user = Auth::user();
        $request->validate([
            'foto'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'         => 'required',
            'email'   => 'required',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->no_hp = $request->input('no_hp');
        $user->alamat = $request->input('alamat');
        $user->kecamatan = $request->input('kecamatan');
        $user->kabupaten = $request->input('kabupaten');
        $user->provinsi = $request->input('provinsi');
        $user->kode_pos = $request->input('kode_pos');

        $user->save();

        return redirect()->route('profil')->with('success', 'Data pengguna berhasil diperbarui');
    }
}
