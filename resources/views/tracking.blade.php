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
    <section class="max-w-5xl w-full mx-auto flex flex-col">
        <div>
            <h1 class="text-3xl text-blue-400 font-bold">Status Pengajuan </h1>
            <p class="text-gray-500 text-sm">Cek status pengajuan secara realtime</p>        
        </div>

        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif    

        <form action="{{ route('tracking.result') }}" method="POST">
            @csrf
            <label for="id" class="block mb-2 text-sm font-medium text-gray-400">Id Pengajuan</label>            
            <input name="id" id="id" type="text" class=" bg-gray-50 border border-gray-300 text-gratwo text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-green-400 focus:border-green-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-300 dark:text-white dark:focus:ring-green-400 dark:focus:border-green-400" placeholder="Tuliskan nama" required autocomplete="off"/>
            <button type="submit">Cek status</button>
        </form>
    </section>
</body>
</html>