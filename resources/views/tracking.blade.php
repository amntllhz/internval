<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Pengajuan</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>
    <section class="lg:max-w-4xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center mt-28 mb-20">
        <div class="flex flex-col justify-center items-center gap-1">
            <h1 class="text-apple-600 lg:text-3xl xs:text-2xl font-bold font-display text-center w-full">Cek Status Pengajuan</h1>
            <p class="text-gray-400 text-sm font-display">Lakukan pengecekan status pengajuan secara berkala</p>           
        </div>

        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif    

        <form action="{{ route('tracking.result') }}" method="POST" class="lg:max-w-3xl xs:max-w-9/10 flex flex-col gap-4 justify-center w-full ring ring-apple-600 p-4 rounded-2xl mt-6">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="id" class="block text-xs font-display text-apple-600 font-semibold">ID Pengajuan</label>            
                <input name="id" id="id" type="text" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-green-400 block w-full p-2.5" placeholder="Tuliskan ID Pengajuan" required autocomplete="off"/>
            </div>
            <button type="submit" class="text-white text-center font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-xl w-full cursor-pointer">Cek status</button>
        </form>

    </section>
    <x-footer></x-footer>
</body>
</html>