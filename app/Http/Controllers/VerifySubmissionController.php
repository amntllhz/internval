<?php

namespace App\Http\Controllers;

use App\Models\Kaprodi;
use App\Models\Submission;
use Illuminate\Http\Request;

class VerifySubmissionController extends Controller
{
    //
    public function showVerify($id)
    {
        $submission = Submission::findOrFail($id);

        $kaprodi = Kaprodi::where('prodi', $submission->prodi)->first();

        return view('verify', compact('submission', 'kaprodi'));
    }
}
