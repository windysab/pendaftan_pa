<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GugatanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi dan simpan data
        $request->validate([
            'nama_penggugat' => 'required|string|max:255',
            'binti_penggugat' => 'required|string|max:255',
            'umur_penggugat' => 'required|integer',
            'agama_penggugat' => 'required|string',
            'pekerjaan_penggugat' => 'required|string|max:255',
            'pendidikan_penggugat' => 'required|string',
            'alamat_penggugat' => 'required|string',
            'nama_tergugat' => 'required|string|max:255',
            'bin_tergugat' => 'required|string|max:255',
            'umur_tergugat' => 'required|integer',
            'agama_tergugat' => 'required|string',
            'pekerjaan_tergugat' => 'required|string|max:255',
            'pendidikan_tergugat' => 'required|string',
            'alamat_tergugat' => 'required|string',
        ]);

        // Simpan data ke database atau lakukan tindakan lain
        // ...

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
