<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AzisHapidin\IndoRegion\RawDataGetter;

class RegionController extends Controller
{
    public function getProvinces()
    {
        return response()->json(RawDataGetter::getProvinces());
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
