<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Pengajuan</title>
    <link rel="icon" href={{ asset('img/icon.svg') }}>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/copy.js'])
</head>
<body>
    <x-navbar></x-navbar>
    <section class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center min-h-screen">
        <div class="items-center justify-center min-h-screen w-full flex">
            <div class="flex flex-col gap-2 bg-gradient-to-b from-white to-apple-200/50 p-4 lg:max-w-xs xs:max-w-9/10 w-full rounded-xl text-center">

                <div class="flex flex-col gap-4 justify-center w-full">
                    <div class="bg-apple-white justify-center items-center flex flex-col rounded-2xl p-6">
                        <img class="h-32" src="{{ asset('img/delsuccess/delete-success.svg') }}" alt="">
                    </div>
                    <div class="flex flex-col gap-1 lg:max-w-xs xs:w-full  mx-auto">
                        <h1 class="text-apple-600 text-center font-semibold font-display">Pengajuan Berhasil Dihapus</h1>
                        <p class="text-apple-600 text-center font-display text-xs">Lakukan pengajuan ulang di halaman pengajuan</p>
                    </div>
                    <a href="{{ url('/home') }}" class="text-white font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md">
                        Kembali ke Beranda
                    </a>
                </div>

            </div>
        </div>
    </section>
    <x-footer></x-footer>
</body>
</html>