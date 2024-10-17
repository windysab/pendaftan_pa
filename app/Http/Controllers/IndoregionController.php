<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class IndoregionController extends Controller
{
    public function searchKabupaten(Request $request)
    {
        $query = $request->input('query');
        $kabupaten = Regency::where('name', 'LIKE', "%{$query}%")->get(['id', 'name']);
        return response()->json($kabupaten);
    }
    public function getKabupaten()
    {
        return Regency::all();
        // Log::info('Kabupaten data:', $kabupaten->toArray());
        return $kabupaten;
    }

    public function getKecamatan($kabupatenId)
    {
        return District::where('regency_id', $kabupatenId)->get();
    }

    // public function getDesa($kecamatanId)
    // {
    //     return Village::where('district_id', $kecamatanId)->get();
    // }


    public function getDesa($kecamatanId)
    {
        // Tambahkan log untuk memastikan parameter yang diterima benar
        Log::info("Fetching desa for kecamatan ID: " . $kecamatanId);

        // Ambil data desa berdasarkan kecamatan ID
        // Pastikan nama kolom sesuai dengan yang ada di database
        $desa = Village::where('district_id', $kecamatanId)->get();

        // Tambahkan log untuk memastikan data yang dikembalikan benar
        Log::info("Fetched desa data: " . $desa);

        return response()->json($desa);
    }
}
