<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Internval - @yield('title')</title>
        <link rel="icon" href={{ asset('img/icon.svg') }}>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,200..800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/copy.js'])
    </head>
    <body class="antialiased">
        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                    <div class="px-4 text-lg font-display text-gray-500 border-r border-gray-400 tracking-wider">
                        @yield('code')
                    </div>

                    <div class="ml-4 text-lg font-display text-gray-500 uppercase tracking-wider">
                        @yield('message')
                    </div>
                </div>
            </div>
        </div> --}}
        <section class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center min-h-screen">
            <div class="items-center justify-center min-h-screen w-full flex">
                <div class="flex flex-col gap-2 mt-10 bg-white p-4 lg:max-w-sm xs:max-w-9/10 w-full rounded-xl text-center">

                    {{-- Delete Success --}}
                    <div class="flex flex-col gap-4 justify-center w-full">
                        <div class="bg-gradient-to-b from-white to-apple-300/50 justify-center items-center flex flex-col rounded-lg p-6">
                            <img class="h-40" src="{{ asset('img/delsuccess/delete-success.svg') }}" alt="">
                        </div>
                        <div class="flex flex-col space-y-4 justify-center items-center">
                            <div class="flex flex-col gap-1 lg:max-w-xs xs:w-full  mx-auto">
                                <h1 class="text-gray-600 text-center font-bold font-display">@yield('code')</h1>
                                <p class="text-gray-400 text-center font-display text-xs">@yield('message')</p>
                            </div>
                            <a href="{{ url('/home') }}" class="text-white font-display w-fit font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-lg">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </body>
</html>
