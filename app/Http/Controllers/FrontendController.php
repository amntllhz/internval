<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Submission;
use Laravolt\Indonesia\Facade as Indonesia;

class FrontendController extends Controller
{
    //
    public function showForm()
    {   
        return view('submission');
    }

    public function submitForm(Request $request)
    {           

        $data = $request->validate([
            'nama_mahasiswa' => 'required|string',
            'nim' => 'required|string',
            'prodi' => 'required|string',
            'instansi_tujuan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'provinsi' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'kecamatan' => 'required|string',
            'desa_kelurahan' => 'required|string',
            'jalan' => 'required|string',
        ]);

        // Konversi kode ke nama wilayah
        $province = Indonesia::allProvinces()->firstWhere('code', $request->provinsi);
        $city = Indonesia::allCities()->firstWhere('code', $request->kabupaten_kota);
        $district = Indonesia::allDistricts()->firstWhere('code', $request->kecamatan);
        $village = Indonesia::allVillages()->firstWhere('code', $request->desa_kelurahan);

        $data['provinsi'] = $province?->name ?? '-';
        $data['kabupaten_kota'] = $city?->name ?? '-';
        $data['kecamatan'] = $district?->name ?? '-';
        $data['desa_kelurahan'] = $village?->name ?? '-';


        $data['id'] = strtoupper(Str::random(8)); // kode unik
        $data['status_pengajuan'] = 'pending';
        $data['status_surat'] = 'none';

        $submission = Submission::create($data);

        return redirect()
            ->route('submission.form')
            ->with('success_id', $submission->id);
    }

    public function success($id)
    {
        return "Pengajuan berhasil! ID Pengajuan Anda: <strong>$id</strong>";
    }

    public function showTrackingForm()
    {
        return view('tracking');
    }

    public function track(Request $request)
    {
        $request->validate([
            'id' => 'required|string'
        ]);

        $submission = Submission::where('id', $request->id)->first();

        if (!$submission) {
            return back()->with('error', 'Pengajuan tidak ditemukan !');
        }

        return view('trackingresult', compact('submission'));
    }
}
