<x-mail::message>
# Pengajuan PKL Anda Berhasil Diterima 🎉

Halo **{{ $nama }}**,  
  
Pengajuan Anda telah berhasil terkirimdan saat ini berstatus **_pending_** untuk diverifikasi oleh dosen pembimbing.

Berikut detail penting untuk Anda simpan:

---

**Kode Pengajuan:**  
<x-mail::panel>
<strong>{{ $kode }}</strong>
</x-mail::panel>

Gunakan kode ini untuk melakukan **cek status pengajuan** di halaman tracking kami.

<x-mail::button :url="url('/tracking')">
Cek Status Pengajuan
</x-mail::button>

---

Terima kasih atas partisipasi Anda.  
Harap menunggu konfirmasi selanjutnya dari dosen pembimbing.

Salam hangat,  
**Tim Internval**  
{{ config('app.name') }}
</x-mail::message>
