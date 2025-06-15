<section class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex lg:flex-row xs:flex-col justify-center items-center h-fit gap-6">
    <div class="lg:w-1/3 xs:w-full flex flex-col justify-center items-center gap-1">
        <h1 class="text-apple-600 text-3xl w-full font-bold font-display lg:text-left xs:text-center">What You Can Do</h1>
        <p class="text-sm lg:max-w-lg xs:max-w-8/10 text-gray-400 lg:text-left xs:text-center font-display font-semibold w-fit">Kemudahan, Kecepatan, Waktu dan Efisiensi dalam satu wadah</p>
    </div>
    <div class="flex flex-col gap-6 lg:w-2/3 xs:w-full justify-center rounded-xl">
        <div class="grid lg:grid-cols-2 xs:grid-cols-1 gap-6 justify-center items-center">
            <div class="flex flex-col gap-4 justify-center w-full ring ring-apple-600 p-4 rounded-3xl">
                <div class="bg-apple-900/10 justify-center items-center flex flex-col rounded-xl p-6">
                    <img class="h-32" src="{{ asset('img/feature/submission.svg') }}" alt="">
                </div>
                <div class="flex flex-col lg:gap-2 xs:gap-1 w-full mx-auto">
                    <a href={{ url('/submission') }} class="flex justify-center items-center text-white text-center font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-xl w-full">
                        Kirim Pengajuan                                                                           
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 ml-2">
                            <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6.905 9.97a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72V18a.75.75 0 0 0 1.5 0v-4.19l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd" />
                            <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                        </svg>                        
                    </a>                    
                </div>
            </div>
            <div class="flex flex-col gap-4 justify-center w-full ring ring-apple-600 p-4 rounded-3xl">
                <div class="bg-apple-900/10 justify-center items-center flex flex-col rounded-xl p-6">
                    <img class="h-32" src="{{ asset('img/feature/tracking.svg') }}" alt="">
                </div>
                <div class="flex flex-col lg:gap-2 xs:gap-1 w-full mx-auto">
                    <a href={{ url('/tracking') }} class="flex justify-center items-center text-white text-center font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-xl w-full">
                        Cek Status Pengajuan
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 ml-2">
                            <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                        </svg>

                    </a>                    
                </div>
            </div>                       
        </div>
    </div>
</section>