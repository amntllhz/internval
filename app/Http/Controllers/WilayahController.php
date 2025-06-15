<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Facade as Indonesia;

class WilayahController extends Controller
{
    //
    public function getKabupaten(Request $request)
    {
        $kabupaten = Indonesia::allCities()->where('province_code', $request->provinsi_id)->values();
        return response()->json($kabupaten);
    }

    public function getKecamatan(Request $request)
    {
        $kecamatan = Indonesia::allDistricts()->where('city_code', $request->kabupaten_id)->values();
        return response()->json($kecamatan);
    }

    public function getDesa(Request $request)
    {
        $desa = Indonesia::allVillages()->where('district_code', $request->kecamatan_id)->values();
        return response()->json($desa);
    }
}
