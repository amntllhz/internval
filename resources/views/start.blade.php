<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get In Touch</title>
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="max-w-5xl w-full mx-auto flex flex-col justify-center items-center min-h-screen">
        <div class="relative flex max-w-md justify-center gap-4 items-center bg-apple-50 rounded-2xl mx-auto ring ring-apple-600">
            <div class="flex relative overflow-hidden flex-col bg-gradient-to-b from-apple-600 to-apple-800 h-full p-16 rounded-tl-2xl rounded-bl-2xl justify-center items-center">
                <h1 class="text-4xl text-white font-head font-semibold w-fit">Masuk Sebagai</h1>                
                <img id="circle-fx" class="w-[500px] absolute -left-32 z-0 opacity-30" src="{{ asset('img/linearrpple.png') }}" alt="">
                <img id="circle-fx" class="w-[500px] absolute -left-32 z-0" src="{{ asset('img/linearfx.png') }}" alt="">
            </div>
            <div class="flex flex-col gap-2 p-8">
                <a href="/home" class="text-white font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md w-28 text-center">Mahasiswa</a>
                <a href="/admin/login" class="text-white font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md w-28 text-center">Dosen</a>
                <a href="/admin/login" class="text-white font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md w-28 text-center">Baak</a>
            </div>

        </div>
    </section>
</body>
</html>