<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Pengajuan</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/copy.js'])
</head>
<body>
    <x-navbar></x-navbar>
    <section class="lg:max-w-4xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center mt-28">
        <div class="flex flex-col justify-center items-center gap-1">
            <h1 class="text-apple-600 lg:text-3xl xs:text-2xl font-bold font-display text-center w-full">Formulir Pengajuan</h1>
            <p class="text-gray-400 text-sm font-display text-center w-full">Baca peraturan mengenai Praktik Kerja Lapangan sebelum melakukan pengajuan</p>        
        </div>

        @if(session('success_id'))
            <!-- Modal Overlay -->
            <div 
                x-data="{ open: true }" 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-lg z-50 min-h-screen"
            >
                
                <div class="bg-apple-50 backdrop-blur-lg p-4 rounded-xl lg:max-w-xs xs:max-w-9/10 w-full text-center mt-20 ring ring-apple-600 relative z-60">
                    <!-- Gambar -->
                    <div class="bg-apple-900/10 p-2 rounded-xl">
                        <img src="{{ asset('img/successub.svg') }}" alt="" class="h-36 mx-auto">
                    </div>

                    <!-- Konten Modal -->
                    <div class="mt-4">
                        <h2 class="text-lg font-display font-bold text-apple-600 mb-2">Pengajuan Berhasil!</h2>
                        <p class="font-display text-xs text-gray-400 mb-1">Klik untuk menyalin ID</p>
                        
                        <div class="w-full mt-2 mb-4">
                            <div class="relative">
                                <label for="npm-install-copy-button" class="sr-only">Label</label>
                                <input id="npm-install-copy-button" type="text" class="font-display bg-gray-50 border border-apple-600 text-gray-800 text-center text-sm block w-full p-2.5 rounded-lg" value={{ session('success_id') }} disabled readonly>
                                <button data-copy-to-clipboard-target="npm-install-copy-button" data-tooltip-target="tooltip-copy-npm-install-copy-button" class="absolute cursor-pointer end-2 top-1/2 -translate-y-1/2 text-gray-500  hover:bg-apple-900/10 rounded-lg p-2 inline-flex items-center justify-center">
                                    <span id="default-icon">
                                        <svg class="w-3.5 h-3.5 text-apple-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                                        </svg>
                                    </span>
                                    <span id="success-icon" class="hidden">
                                        <svg class="w-3.5 h-3.5 text-apple-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </span>
                                </button>
                                <div id="tooltip-copy-npm-install-copy-button" role="tooltip" class="absolute z-10 invisible inline-block px-2 py-1.5 text-sm font-medium text-white transition-opacity duration-300 bg-apple-600 rounded-lg opacity-0 tooltip">
                                    <span id="default-tooltip-message" class="text-xs font-display">Copy to clipboard</span>
                                    <span id="success-tooltip-message" class="hidden text-xs font-display">Copied !</span>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Tutup -->
                        <button 
                            @click="open = false" 
                            class="text-white font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md w-full cursor-pointer"
                        >
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endif
        
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
                    <label for="provinsi" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Provinsi <span class="text-gray-400">*</span></label>            
                    <input name="provinsi" id="provinsi" type="text" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="Provinsi" required autocomplete="off"/>
                </div>

                <div class="col-span-3">
                    <label for="kabupaten_kota" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Kabupaten / Kota <span class="text-gray-400">*</span></label>            
                    <input name="kabupaten_kota" id="kabupaten_kota" type="text" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="Kabupaten / Kota" required autocomplete="off"/>
                </div>

                <div class="col-span-3">
                    <label for="kecamatan" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Kecamatan <span class="text-gray-400">*</span></label>            
                    <input name="kecamatan" id="kecamatan" type="text" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="Kecamatan" required autocomplete="off"/>
                </div>

                <div class="col-span-3">
                    <label for="desa_kelurahan" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Desa / Kelurahan <span class="text-gray-400">*</span></label>            
                    <input name="desa_kelurahan" id="desa_kelurahan" type="text" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="Desa / Kelurahan" required autocomplete="off"/>
                </div>

                <div class="col-span-3">
                    <label for="jalan" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Jalan / No <span class="text-gray-400">*</span></label>            
                    <input name="jalan" id="jalan" type="text" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5 " placeholder="Jalan / No" required autocomplete="off"/>
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

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>