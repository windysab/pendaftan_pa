<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GugatanController extends Controller
{
    public function showForm1()
    {
        // Ambil data dari session
        $data = session('gugatan_form', []);
        return view('pages.gugatan-form', ['data' => $data, 'type_menu' => 'gugatan']);
    }

    public function saveForm1(Request $request)
    {
        // Simpan data ke session
        $request->session()->put('gugatan_form', $request->all());

        // Redirect ke halaman berikutnya
        return redirect()->route('gugatan.page2');
    }

    public function showPage2()
    {
        // Ambil data dari session
        $data = session('gugatan_form', []);
        return view('pages.gugatan-page2', ['data' => $data, 'type_menu' => 'gugatan']);
    }

    public function savePage2(Request $request)
    {
        // Simpan data ke session
        $request->session()->put('gugatan_form', array_merge(
            session('gugatan_form', []),
            $request->all()
        ));

        // Redirect ke halaman berikutnya
        return redirect()->route('gugatan.page3');
    }

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
