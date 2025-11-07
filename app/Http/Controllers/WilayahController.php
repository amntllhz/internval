<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Facade as Indonesia;

class WilayahController extends Controller
{
    //
    public function getKabupaten(Request $request)
    {
        $kabupaten = \Laravolt\Indonesia\Models\City::where('province_code', $request->provinsi_id)->get(['code', 'name']);
        return response()->json($kabupaten);
    }

    public function getKecamatan(Request $request)
    {
        $kecamatan = \Laravolt\Indonesia\Models\District::where('city_code', $request->kabupaten_id)->get(['code', 'name']);
        return response()->json($kecamatan);
    }

    public function getDesa(Request $request)
    {
        $desa = \Laravolt\Indonesia\Models\Village::where('district_code', $request->kecamatan_id)->get(['code', 'name']);
        return response()->json($desa);
    }
}
