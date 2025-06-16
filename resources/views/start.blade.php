<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get In Touch</title>
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/copy.js'])
</head>
<body>
    <section class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center min-h-screen">
        <div class="relative flex lg:flex-row xs:flex-col max-w-md justify-center gap-4 items-center bg-apple-50 rounded-2xl mx-auto ring ring-apple-600">
            <div class="flex relative overflow-hidden flex-col bg-linear-to-b/hsl from-apple-600 to-apple-900 h-full lg:p-16 xs:p-8 lg:rounded-tl-2xl lg:rounded-bl-2xl lg:rounded-tr-none lg:rounded-br-none xs:rounded-t-2xl xs:rounded-b-none justify-center items-center">
                <h1 class="text-4xl text-white font-head font-semibold w-fit z-10">Masuk Sebagai</h1>                                
                <img id="circle-fx" class=" absolute h-full opacity-30 w-full z-0" src="{{ asset('img/grid.png') }}" alt="">
            </div>
            <div class="flex flex-col gap-2 p-8 items-center justify-center">
                <a href="/home" class="text-white font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md lg:w-28 xs:w-56 text-center">Mahasiswa</a>
                <a href="/admin/login" class="text-white font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md lg:w-28 xs:w-56 text-center">Dosen</a>
                <a href="/admin/login" class="text-white font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md lg:w-28 xs:w-56 text-center">Baak</a>
            </div>
        </div>
                        
    </section>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>