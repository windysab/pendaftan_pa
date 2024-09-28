<?php
// app/Http/Controllers/GugatanController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gugatan;

class GugatanController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'penggugat_name' => 'required|string|max:255',
            'binti_penggugat' => 'required|string|max:255',
            'umur_penggugat' => 'required|string|max:255',
            'agama_penggugat' => 'required|string|max:255',
            'pekerjaan_penggugat' => 'required|string|max:255',
            'pendidikan_penggugat' => 'required|string|max:255',
            'alamat_penggugat' => 'required|string|max:255',
            'tergugat_name' => 'required|string|max:255',
            'binti_tergugat' => 'required|string|max:255',
            'umur_tergugat' => 'required|string|max:255',
            'agama_tergugat' => 'required|string|max:255',
            'pekerjaan_tergugat' => 'required|string|max:255',
            'pendidikan_tergugat' => 'required|string|max:255',
            'alamat_tergugat' => 'required|string|max:255',
            'hari_pernikahan' => 'required|string|max:255',
            'tanggal_pernikahan' => 'required|string|max:255',
            'desa_pernikahan' => 'required|string|max:255',
            'kecamatan_pernikahan' => 'required|string|max:255',
            'kabupaten_pernikahan' => 'required|string|max:255',
            'nomor_akta_nikah' => 'required|string|max:255',
            'tanggal_akta_nikah' => 'required|string|max:255',
            'kecamatan_kua' => 'required|string|max:255',
            'kabupaten_kua' => 'required|string|max:255',
            'tempat_tinggal' => 'required|string|max:255',
            'desa_input' => 'required|string|max:255',
            'lainnya_textarea' => 'nullable|string|max:255',
            'kumpul_baik_selama_tahun' => 'required|string|max:255',
            'kumpul_baik_selama_bulan' => 'required|string|max:255',
            'jumlah_anak' => 'required|string|max:255',
            'anak_1' => 'nullable|string|max:255',
            'tanggal_lahir_anak_1' => 'nullable|date',
            'anak_2' => 'nullable|string|max:255',
            'tanggal_lahir_anak_2' => 'nullable|date',
            'anak_3' => 'nullable|string|max:255',
            'tanggal_lahir_anak_3' => 'nullable|date',
            'anak_4' => 'nullable|string|max:255',
            'tanggal_lahir_anak_4' => 'nullable|date',
            'anak_5' => 'nullable|string|max:255',
            'tanggal_lahir_anak_5' => 'nullable|date',
            'anak_6' => 'nullable|string|max:255',
            'tanggal_lahir_anak_6' => 'nullable|date',
            'anak_7' => 'nullable|string|max:255',
            'tanggal_lahir_anak_7' => 'nullable|date',
            'anak_8' => 'nullable|string|max:255',
            'tanggal_lahir_anak_8' => 'nullable|date',
            'anak_9' => 'nullable|string|max:255',
            'tanggal_lahir_anak_9' => 'nullable|date',
            'anak_10' => 'nullable|string|max:255',
            'tanggal_lahir_anak_10' => 'nullable|date',
            'tanggal_persilihan' => 'nullable|date',
            'alasan_persilihan' => 'nullable|string|max:255',
            'detail_alasan' => 'nullable|string',
            'upaya_merukunkan' => 'required|string|max:255', // Ensure this field is included
            'tanggal_perpisahan' => 'nullable|date',
            'jenis_perpisahan' => 'nullable|string|max:255',
            'siapa_meninggalkan' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:255',
            'alasan_meninggalkan' => 'nullable|string|max:255',
        ]);

        Gugatan::create($data);

        return redirect()->route('gugatan.page2');
    }

    public function update(Request $request, Gugatan $gugatan)
    {
        $data = $request->validate([
            'tanggal_persilihan' => 'nullable|date',
            'alasan_persilihan' => 'nullable|string|max:255',
            'detail_alasan' => 'nullable|string',
            'upaya_merukunkan' => 'required|string|max:255', // Ensure this field is included
            'anak_1' => 'nullable|string|max:255',
            'tanggal_lahir_anak_1' => 'nullable|date',
            'anak_2' => 'nullable|string|max:255',
            'tanggal_lahir_anak_2' => 'nullable|date',
            'anak_3' => 'nullable|string|max:255',
            'tanggal_lahir_anak_3' => 'nullable|date',
            'anak_4' => 'nullable|string|max:255',
            'tanggal_lahir_anak_4' => 'nullable|date',
            'anak_5' => 'nullable|string|max:255',
            'tanggal_lahir_anak_5' => 'nullable|date',
            'anak_6' => 'nullable|string|max:255',
            'tanggal_lahir_anak_6' => 'nullable|date',
            'anak_7' => 'nullable|string|max:255',
            'tanggal_lahir_anak_7' => 'nullable|date',
            'anak_8' => 'nullable|string|max:255',
            'tanggal_lahir_anak_8' => 'nullable|date',
            'anak_9' => 'nullable|string|max:255',
            'tanggal_lahir_anak_9' => 'nullable|date',
            'anak_10' => 'nullable|string|max:255',
            'tanggal_lahir_anak_10' => 'nullable|date',
            'tanggal_perpisahan' => 'nullable|date',
            'jenis_perpisahan' => 'nullable|string|max:255',
            'siapa_meninggalkan' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:255',
            'alasan_meninggalkan' => 'nullable|string|max:255',
            
        ]);

        $gugatan->update($data);

        return redirect()->route('gugatan.page3');
    }
}
