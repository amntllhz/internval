<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Submission;

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
        ]);

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
            return back()->with('error', 'ID Pengajuan tidak ditemukan.');
        }

        return view('trackingresult', compact('submission'));
    }
}
