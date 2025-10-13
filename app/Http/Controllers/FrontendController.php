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
            'nama_mahasiswa' => ['required', 'string','regex:/^[A-Za-z\s]+$/'],
            'email' => 'required|email',
            'nim' => 'required|string',
            'prodi' => 'required|string',
            'instansi_tujuan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'provinsi' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'kecamatan' => 'required|string',
            'desa_kelurahan' => 'required|string',
            'jalan' => ['required','string','regex:/^[A-Za-z0-9\s.,]+$/'],
        ]);

        // 🔍 Cek apakah NIM sudah pernah digunakan untuk submission
        $existing = Submission::where('nim', $request->nim)->first();

        if ($existing) {
            // Kirim pesan error ke session agar bisa tampil sebagai modal
            return redirect()
                ->back()
                ->withInput()
                ->with('nim_exists', true)
                ->with('nim_value', $request->nim);
        }

        // Konversi kode ke nama wilayah
        $province = Indonesia::allProvinces()->firstWhere('code', $request->provinsi);
        $city = Indonesia::allCities()->firstWhere('code', $request->kabupaten_kota);
        $district = Indonesia::allDistricts()->firstWhere('code', $request->kecamatan);
        $village = Indonesia::allVillages()->firstWhere('code', $request->desa_kelurahan);        

        $data['provinsi'] = $province ? Str::title(Str::lower($province->name)) : '-';
        $data['kabupaten_kota'] = $city ? Str::title(Str::lower($city->name)) : '-';
        $data['kecamatan'] = $district ? Str::title(Str::lower($district->name)) : '-';
        $data['desa_kelurahan'] = $village ? Str::title(Str::lower($village->name)) : '-';

        // Format nama dan jalan jadi kapital awal kata untuk nama, instansi, dan jalan
        $data['nama_mahasiswa'] = Str::title(Str::lower($data['nama_mahasiswa']));
        $data['instansi_tujuan'] = Str::title(Str::lower($data['instansi_tujuan']));
        $data['jalan'] = Str::title(Str::lower($data['jalan']));


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
