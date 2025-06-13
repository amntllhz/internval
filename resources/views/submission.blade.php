<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pengajuan</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="max-w-5xl w-full mx-auto flex flex-col">
        <div>
            <h1 class="text-3xl text-blue-400 font-bold">Form Pengajuan </h1>
            <p class="text-gray-500 text-sm">Lakukan pengisian data dengan benar</p>        
        </div>
        <form method="POST" action="{{ route('submission.submit') }}" class="mt-10 grid grid-cols-6 gap-6">
            @csrf
            <div class="col-span-6">
                <label for="nama_mahasiswa" class="block mb-2 text-sm font-medium text-gray-400">Nama</label>            
                <input name="nama_mahasiswa" id="nama_mahasiswa" type="text" class=" bg-gray-50 border border-gray-300 text-gratwo text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-green-400 focus:border-green-400 block w-full p-2.5 " placeholder="Tuliskan nama" required autocomplete="off"/>
            </div>           
            
            <div class="col-span-3">
                <label for="nim" class="block mb-2 text-sm font-medium text-gray-400">NIM</label>            
                <input name="nim" id="nim" type="number" class="decoration-none bg-gray-50 border border-gray-300 text-gratwo text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-green-400 focus:border-green-400 block w-full p-2.5 " placeholder="Tuliskan nama" required autocomplete="off"/>
            </div>

            <div class="col-span-3">
                <label for="prodi" class="block mb-2 text-sm font-medium text-gray-400">prodi</label>            
                <select id="prodi" name="prodi" class="bg-gray-50 border border-gray-300 text-prim text-xs rounded-lg focus:ring-prim focus:border-prim block w-full p-2.5 ">                        
                    <option class="text-xs" value="S1 Informatika">S1 Informatika</option>
                    <option class="text-xs" value="S1 Teknik Mesin">S1 Teknik Mesin</option>                        
                </select>
            </div>            

            <div class="col-span-6">
                <label for="instansi_tujuan" class="block mb-2 text-sm font-medium text-gray-400">Instansi Tujuan</label>            
                <input name="instansi_tujuan" id="instansi_tujuan" type="text" class=" bg-gray-50 border border-gray-300 text-gratwo text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-green-400 focus:border-green-400 block w-full p-2.5 " placeholder="Tuliskan nama" required autocomplete="off"/>
            </div>

            <div class="col-span-3">
                <label for="tanggal_mulai" class="block mb-2 text-sm font-medium text-gray-400">Tanggal Mulai</label>            
                <input name="tanggal_mulai" id="tanggal_mulai" type="date" class=" bg-gray-50 border border-gray-300 text-gratwo text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-green-400 focus:border-green-400 block w-full p-2.5 " placeholder="Tuliskan nama" required autocomplete="off"/>
            </div>

            <div class="col-span-3">
                <label for="tanggal_selesai" class="block mb-2 text-sm font-medium text-gray-400">Tanggal Selesai</label>            
                <input name="tanggal_selesai" id="tanggal_selesai" type="date" class=" bg-gray-50 border border-gray-300 text-gratwo text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-green-400 focus:border-green-400 block w-full p-2.5 " placeholder="Tuliskan nama" required autocomplete="off"/>
            </div>

            <button type="submit" class="col-span-2 w-fit flex gap-2 items-center rounded-lg bg-green-400 px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 transition-all duration-300 focus-visible:outline  focus-visible:outline-offset-2 focus-visible:outline-green-400">                                       
                Cek Status Gizi
            </button>
        </form>
    </section>
</body>
</html>