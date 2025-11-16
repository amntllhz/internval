<x-mail::message>
# Pengajuan Magang Berhasil Terkirim !

Halo **{{ $nama }}**,  
  
Pengajuan Anda telah berhasil terkirim dan saat ini berstatus **Pending** untuk diverifikasi lebih lanjut oleh Kaprodi.

Berikut detail penting untuk Anda simpan:

---

**Kode Pengajuan:**  
<x-mail::panel>
<strong>{{ $kode }}</strong>
</x-mail::panel>

Gunakan kode ini untuk melakukan **Cek Status Pengajuan** di halaman tracking Internval.

<x-mail::button :url="config('app.url').'/tracking'">
Cek Status Pengajuan
</x-mail::button>

---

Terima kasih atas pengajuan anda.  
Harap hubungi Kaprodi untuk melakukan verifikasi lebih lanjut.

Salam hangat,  
**Tim Internval**
</x-mail::message>
