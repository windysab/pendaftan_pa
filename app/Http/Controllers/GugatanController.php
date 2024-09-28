<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GugatanController extends Controller
{
    // Metode untuk menyimpan data dari halaman pertama
    public function storePage1(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'hari_pernikahan' => 'required|string',
            'tanggal_pernikahan' => 'required|date',
            'desa_pernikahan' => 'required|string',
            'kecamatan_pernikahan' => 'required|string',
            'kabupaten_pernikahan' => 'required|string',
            'nomor_akta_nikah' => 'required|string',
            'tanggal_akta_nikah' => 'required|date',
            'kecamatan_kua' => 'required|string',
            'kabupaten_kua' => 'required|string',
        ]);

        // Simpan data ke session
        $request->session()->put('gugatan', $request->all());

        // Redirect ke halaman berikutnya
        return redirect()->route('gugatan.page2');
    }

    // Metode untuk menyimpan data dari halaman kedua
    public function storePage2(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'tempat_tinggal' => 'required|string',
            'kumpul_baik_selama_tahun' => 'required|integer',
            'kumpul_baik_selama_bulan' => 'required|integer',
            'jumlah_anak' => 'required|integer',
            // Tambahkan validasi untuk anak-anak jika diperlukan
        ]);

        // Simpan data ke session
        $request->session()->put('page2', $request->all());

        // Simpan data dari session ke database atau lakukan tindakan lain
        $page1Data = $request->session()->get('page1');
        $page2Data = $request->session()->get('page2');

        // Contoh penyimpanan ke database (sesuaikan dengan model dan tabel yang digunakan)
        // \App\Models\Gugatan::create(array_merge($page1Data, $page2Data));

        // Redirect ke halaman berikutnya atau halaman sukses
        return redirect()->route('gugatan.page3');
    }

    // Metode untuk menampilkan halaman pertama
    public function showPage1()
    {
        return view('gugatan-page1');
    }

    // Metode untuk menampilkan halaman kedua
    public function showPage2()
    {
        return view('gugatan-page2');
    }

    // Metode untuk menampilkan halaman ketiga atau halaman sukses
    public function showPage3()
    {
        return view('gugatan-page3');
    }
}
