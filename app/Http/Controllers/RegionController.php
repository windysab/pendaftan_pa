<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AzisHapidin\IndoRegion\RawDataGetter;
use Illuminate\Support\Facades\Cache;

class RegionController extends Controller
{



    public function getProvinces()
    {
        $provinces = Cache::remember('provinces', 60 * 60, function () {
            return RawDataGetter::getProvinces();
        });

        return response()->json($provinces);
    }

    public function getRegencies($province_id)
    {
        return response()->json(RawDataGetter::getRegencies($province_id));
    }

    public function getDistricts($regency_id)
    {
        return response()->json(RawDataGetter::getDistricts($regency_id));
    }


    public function getVillages($district_id)
    {
        return response()->json(RawDataGetter::getVillages($district_id));
    }
}
