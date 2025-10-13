<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get In Touch</title>
    <link rel="icon" href={{ asset('img/icon.svg') }}>
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center min-h-screen">
        <div class="relative flex p-2 lg:flex-row xs:flex-col max-w-5xl justify-center gap-4 items-center bg-white rounded-2xl mx-auto ring ring-apple-600">
            <div class="flex relative overflow-hidden flex-col bg-linear-to-b/hsl from-apple-600 to-apple-900 h-full lg:p-16 xs:p-8 lg:rounded-xl xs:rounded-t-2xl xs:rounded-b-none justify-center items-center">
                <h1 class="text-4xl text-white font-head font-semibold w-fit z-10">Masuk Sebagai</h1>                                
                <img id="circle-fx" class=" absolute h-full opacity-30 w-full z-0" src="{{ asset('img/grid.png') }}" alt="">
            </div>
            <div class="relative flex flex-col space-y-1 p-6 items-center justify-center">
                <a href={{ route('mahasiswa.redirect') }} class="text-white flex justify-center items-center gap-2 font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md lg:w-56 xs:w-56 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                    </svg>
                    Mahasiswa
                </a>

                <div class="relative flex justify-center items-center">
                    <hr class="w-56 h-px my-4 bg-gray-200 border-0">
                    <p class="absolute text-gray-400 text-center bg-white px-2 -translate-x-1/2 left-1/2 font-display text-[10px]">atau masuk sebagai</p>
                </div>

                <div class="w-full flex lg:flex-row lg:justify-between xs:flex-col xs:gap-2">
                    <a href="/admin/login" class="flex justify-center items-center gap-2 text-gray-500 font-display font-bold bg-gray-200 hover:bg-gray-300 hover:text-white transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md lg:w-[108px] xs:w-56 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                        </svg>
                        Dosen
                    </a>
                    <a href="/admin/login" class="flex justify-center items-center gap-2 text-gray-500 font-display font-bold bg-gray-200 hover:bg-gray-300 hover:text-white transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md lg:w-[108px] xs:w-56 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
                        </svg>
                        BAAK
                    </a>
                </div>
            </div>
        </div>
                        
    </section>
</body>
</html>