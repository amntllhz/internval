<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Pengajuan</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>
    <section class="lg:max-w-4xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center mt-28">
        <div class="flex flex-col justify-center items-center gap-1">
            <h1 class="text-apple-600 lg:text-3xl xs:text-2xl font-bold font-display text-center w-full">Formulir Pengajuan</h1>
            <p class="text-gray-400 text-sm font-display text-center w-full">Baca peraturan mengenai Praktik Kerja Lapangan sebelum melakukan pengajuan</p>        
        </div>
        
        <form method="POST" action="{{ route('submission.submit') }}" class="mt-8 mb-10 w-full gap-6">
            @csrf

            <div class="border-b border-gray-900/10 pb-12 grid lg:grid-cols-6 xs:grid-cols-1 gap-6">
                <div class="col-span-full">
                    <h2 class="text-gray-800 text-left w-full font-bold font-display">Data Mahasiswa</h2>
                    <p class="text-gray-400 text-xs text-left w-full font-display">Form dengan tanda ( <span class="text-gray-400">*</span> ) wajib diisi</p>
                </div>
    
                <div class="col-span-3">
                    <label for="nama_mahasiswa" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Nama <span class="text-gray-400">*</span></label>            
                    <input name="nama_mahasiswa" id="nama_mahasiswa" type="text" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="Nama Lengkap" required autocomplete="off"/>
                </div>           
                
                <div class="col-span-3">
                    <label for="nim" class="block mb-2 text-xs font-display text-apple-600 font-semibold">NIM <span class="text-gray-400">*</span></label>            
                    <input name="nim" id="nim" type="number" class="decoration-none bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="Nomor Induk Mahasiswa" required autocomplete="off"/>
                </div>
    
                <div class="col-span-3">
                    <label for="prodi" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Prodi <span class="text-gray-400">*</span></label>            
                    <select id="prodi" name="prodi" class="bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs placeholder:font-display block w-full p-2.5 ">                        
                        <option class="text-xs font-display" value="S1 Informatika">S1 Informatika</option>
                        <option class="text-xs font-display" value="S1 Teknik Mesin">S1 Teknik Mesin</option>                        
                    </select>
                </div>     
            </div>
            
            {{-- data instansi --}}

            <div class="border-b border-gray-900/10 pb-12 grid lg:grid-cols-6 xs:grid-cols-1 gap-6 mt-10">
                <div class="col-span-full">
                    <h2 class="text-gray-800 text-left w-full font-bold font-display">Data Instansi / Perusahaan / Lembaga</h2>
                    <p class="text-gray-400 text-xs text-left w-full font-display">Form dengan tanda ( <span class="text-gray-400">*</span> ) wajib diisi</p>
                </div>
    
                <div class="col-span-3">
                    <label for="instansi_tujuan" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Instansi Tujuan <span class="text-gray-400">*</span></label>            
                    <input name="instansi_tujuan" id="instansi_tujuan" type="text" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="Nama Instansi / Perusahaan / Lembaga" required autocomplete="off"/>
                </div>
    
                <div class="col-span-3">
                    <label for="tanggal_mulai" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Tanggal Mulai <span class="text-gray-400">*</span></label>            
                    <input name="tanggal_mulai" id="tanggal_mulai" type="date" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="" required autocomplete="off"/>
                </div>
    
                <div class="col-span-3">
                    <label for="tanggal_selesai" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Tanggal Selesai <span class="text-gray-400">*</span></label>            
                    <input name="tanggal_selesai" id="tanggal_selesai" type="date" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="" required autocomplete="off"/>
                </div>
            </div>

            <div class="lg:col-span-full xs:col-span-3 w-full ">
                <button type="submit" class="text-white cursor-pointer text-center font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-xl w-full">                                       
                    Ajukan
                </button>
            </div>
        </form>
    </section>
</body>
</html>