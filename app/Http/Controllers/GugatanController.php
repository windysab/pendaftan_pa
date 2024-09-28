<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gugatan;
use Illuminate\Support\Facades\Log;

class GugatanController extends Controller
{
    public function store(Request $request)
    {
        // Ambil data dari session
        $sessionData1 = $request->session()->get('gugatan_form', []);
        $sessionData2 = $request->session()->get('gugatan_page2', []);

        // Gabungkan data dari session dengan data dari request
        $data = array_merge(
            $sessionData1,
            $sessionData2,
            $request->all()
        );

        // Log data gabungan untuk debugging
        Log::info('Data received for storing:', $data);

        // Validasi data
        $validatedData = $this->validateData($data);

        // Simpan data ke database
        try {
            $gugatan = Gugatan::create($validatedData);
            Log::info('Data stored successfully.');
            return redirect()->route('gugatan.success')->with('gugatan', $gugatan);
        } catch (\Exception $e) {
            Log::error('Error storing data:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['msg' => 'Error storing data.']);
        }
    }

    private function validateData(array $data)
    {
        return validator($data, [
            'nama_penggugat' => 'required|string|max:255',
            'binti_penggugat' => 'required|string|max:255',
            'umur_penggugat' => 'required|string|max:255',
            'agama_penggugat' => 'required|string|max:255',
            'pekerjaan_penggugat' => 'required|string|max:255',
            'pendidikan_penggugat' => 'required|string|max:255',
            'alamat_penggugat' => 'required|string|max:255',
            'nama_tergugat' => 'required|string|max:255',
            'bin_tergugat' => 'required|string|max:255',
            'umur_tergugat' => 'required|string|max:255',
            'agama_tergugat' => 'required|string|max:255',
            'pekerjaan_tergugat' => 'required|string|max:255',
            'pendidikan_tergugat' => 'required|string|max:255',
            'alamat_tergugat' => 'required|string|max:255',
            'hari_pernikahan' => 'required|string|max:255',
            'tanggal_pernikahan' => 'required|date',
            'desa_pernikahan' => 'required|string|max:255',
            'kecamatan_pernikahan' => 'required|string|max:255',
            'kabupaten_pernikahan' => 'required|string|max:255',
            'nomor_akta_nikah' => 'required|string|max:255',
            'tanggal_akta_nikah' => 'required|date',
            'kecamatan_kua' => 'required|string|max:255',
            'kabupaten_kua' => 'required|string|max:255',
            'tempat_tinggal' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'detail_lainnya' => 'nullable|string|max:255',
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
            'tanggal_perselisihan' => 'nullable|date',
            'alasan_perselisihan' => 'nullable|string|max:255',
            'detail_alasan' => 'nullable|string',
            'upaya_merukunkan' => 'required|string|max:255',
            'tanggal_perpisahan' => 'nullable|date',
            'jenis_perpisahan' => 'required|string|max:255',
            'siapa_meninggalkan' => 'required|string|max:255',
            'alasan_meninggalkan' => 'nullable|string|max:255',
        ])->validate();
    }
}
