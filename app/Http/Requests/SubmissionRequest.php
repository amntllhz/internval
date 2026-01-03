<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_mahasiswa' => ['required', 'string','regex:/^[A-Za-z\s]+$/'],
            'email' => 'required|email',
            'nim' => 'required|string',
            'prodi' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'telepon' => ['required','string','regex:/^[0-9]{10,15}$/'],
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => ['required','string','regex:/^[A-Za-z0-9\s.,]+$/'],
            'judul_laporan' => 'required|string',
            'instansi_tujuan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'provinsi' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'kecamatan' => 'required|string',
            'desa_kelurahan' => 'required|string',
            'jalan' => ['required','string','regex:/^[A-Za-z0-9\s.,]+$/'],
            'telepon_instansi' => ['required','string','regex:/^[0-9]{10,15}$/'],
            'dospem_req_id' => 'required|exists:dospems,id',            
        ];
    }
}
