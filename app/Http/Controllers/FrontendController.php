<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Models\Submission;
use Illuminate\Support\Str;
use App\Mail\SubmissionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravolt\Indonesia\Models\City;
use Illuminate\Support\Facades\Mail;
use Laravolt\Indonesia\Models\Village;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Facade as Indonesia;

class FrontendController extends Controller
{
    //
    public function showForm()
    {   
        return view('submission');
    }

    public function submitForm(SubmissionRequest $request)
    {           

        $data = $request->validated();

        // 🔍 Cek apakah NIM sudah pernah digunakan untuk submission
        $existing = Submission::where('nim', $data['nim'])->first();

        if ($existing) {
            // Kirim pesan error ke session agar bisa tampil sebagai modal
            return redirect()
                ->back()
                ->withInput()
                ->with('nim_exists', true)
                ->with('nim_value', $data['nim']);
        }

        // Konversi kode ke nama wilayah
        $province = Province::where('code', $data['provinsi'])->first();
        $city = City::where('code', $data['kabupaten_kota'])->first();
        $district = District::where('code', $data['kecamatan'])->first();
        $village = Village::where('code', $data['desa_kelurahan'])->first();        

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

        try {
            Mail::to($submission->email)->queue(new SubmissionMail($submission));
        } catch (\Exception $e) {
            Log::error('Gagal mengirim email ke: '.$submission->email.' | Error: '.$e->getMessage());
        }

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

    public function deleteSubmission($id)
    {
        $submission = Submission::findOrFail($id);

        // Optional: pastikan hanya pemilik kode yang bisa menghapus
        // Jika kamu punya sistem login, bisa dicek di sini
        // misal: auth()->user()->email == $submission->email

        $submission->delete();

        return view('delete-success'); // akan menampilkan halaman sukses
    }
}
