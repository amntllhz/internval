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
                
        <div class="w-full max-w-[16rem] mt-10">
            <div class="relative">
                <label for="npm-install-copy-button" class="sr-only">Label</label>
                <input id="npm-install-copy-button" type="text" class="font-display bg-gray-50 border border-apple-600 text-gray-500 text-sm block w-full p-2.5 rounded-lg" value="npm install flowbite" disabled readonly>
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


    </section>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>