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

        $desa = Village::where('district_id', $kecamatanId)->get();


        return response()->json($desa);
    }
}
