<section id="feature" class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex lg:flex-row md:flex-row xs:flex-col justify-center items-center h-fit gap-6 pt-24">

    {{-- Judul --}}
    <div class="lg:w-1/3 md:w-1/4 xs:w-full flex flex-col justify-center items-center gap-1 ">
        <h1 class="text-apple-600 text-3xl w-full font-bold font-display lg:text-left xs:text-center">Simply New Ways</h1>
        <p class="text-sm lg:max-w-lg xs:max-w-8/10 text-gray-400 lg:text-left xs:text-center font-display font-semibold w-fit">Kemudahan, Kecepatan, Waktu dan Efisiensi dalam satu genggaman</p>
    </div>

    {{-- Fitur --}}
    <div class="flex md:flex-row xs:flex-col gap-6 md:w-3/4 lg:w-2/3 xs:w-full justify-center rounded-xl">
        <div class="grid lg:grid-cols-2 md:grid-cols-2 xs:grid-cols-1 gap-6 justify-center items-center">

            {{-- Kirim Pengajuan --}}
            <div class="flex flex-col gap-3 justify-center w-full ring ring-apple-500 p-3 rounded-3xl">
                <div class="bg-gradient-to-b from-white to-apple-500/20 justify-center items-center flex flex-col rounded-xl p-6">
                    <img class="h-32" src="{{ asset('img/feature/sendsub2.svg') }}" alt="">
                </div>
                <div class="flex flex-col lg:gap-2 xs:gap-1 w-full mx-auto">
                    <a href={{ url('/submission') }} class="flex justify-center items-center text-white text-center font-display font-bold bg-apple-600 hover:bg-apple-600/90 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-xl w-full inset-ring inset-ring-apple-700/20 outline -outline-offset-2 outline-apple-500/30 shadow-md shadow-apple-700/40 inset-shadow-[0_-3px_4px] inset-shadow-apple-700/80">
                        Kirim Pengajuan                                                                           
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 ml-2">
                            <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                        </svg>
                    </a>                    
                </div>
            </div>

            {{-- Cek Status Pengajuan --}}
            <div class="flex flex-col gap-3 justify-center w-full ring ring-apple-500 p-3 rounded-3xl">
                <div class="bg-gradient-to-b from-white to-apple-500/20 justify-center items-center flex flex-col rounded-xl p-6">
                    <img class="h-32" src="{{ asset('img/feature/tracking.svg') }}" alt="">
                </div>
                <div class="flex flex-col lg:gap-2 xs:gap-1 w-full mx-auto">
                    <a href={{ url('/tracking') }} class="flex justify-center items-center text-white text-center font-display font-bold bg-apple-600 hover:bg-apple-600/90 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-xl w-full inset-ring inset-ring-apple-700/20 outline -outline-offset-2 outline-apple-500/30 shadow-md shadow-apple-700/40 inset-shadow-[0_-3px_4px] inset-shadow-apple-700/80">
                        Cek Status Pengajuan
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 ml-2">
                            <path fill-rule="evenodd" d="M8.161 2.58a1.875 1.875 0 0 1 1.678 0l4.993 2.498c.106.052.23.052.336 0l3.869-1.935A1.875 1.875 0 0 1 21.75 4.82v12.485c0 .71-.401 1.36-1.037 1.677l-4.875 2.437a1.875 1.875 0 0 1-1.676 0l-4.994-2.497a.375.375 0 0 0-.336 0l-3.868 1.935A1.875 1.875 0 0 1 2.25 19.18V6.695c0-.71.401-1.36 1.036-1.677l4.875-2.437ZM9 6a.75.75 0 0 1 .75.75V15a.75.75 0 0 1-1.5 0V6.75A.75.75 0 0 1 9 6Zm6.75 3a.75.75 0 0 0-1.5 0v8.25a.75.75 0 0 0 1.5 0V9Z" clip-rule="evenodd" />
                        </svg>
                    </a>                    
                </div>
            </div> 

        </div>
    </div>
    
</section>