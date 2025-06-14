<section class="lg:max-w-5xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center h-fit gap-6">
    <div class="w-full flex flex-col justify-center items-center gap-1">
        <h1 class="text-apple-600 text-3xl font-bold font-display text-center">What You Can Do</h1>
        <p class="text-sm max-w-lg text-gray-400 text-center font-display font-semibold w-fit">Kemudahan, Kecepatan, Waktu dan Efisiensi dalam satu wadah</p>
    </div>
    <div class="flex flex-col gap-6 w-full justify-center rounded-xl">
        <div class="grid lg:grid-cols-2 xs:grid-cols-1 gap-6 justify-center items-center">
            <div class="flex flex-col gap-4 justify-center w-full ring ring-apple-600 p-4 rounded-3xl">
                <div class="bg-apple-900/10 justify-center items-center flex flex-col rounded-xl p-6">
                    <img class="h-32" src="{{ asset('img/feature/submission.svg') }}" alt="">
                </div>
                <div class="flex flex-col lg:gap-2 xs:gap-1 w-full mx-auto">
                    <a href={{ url('/submission') }} class="text-white text-center font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-xl w-full">Kirim Pengajuan</a>                    
                </div>
            </div>
            <div class="flex flex-col gap-4 justify-center w-full ring ring-apple-600 p-4 rounded-3xl">
                <div class="bg-apple-900/10 justify-center items-center flex flex-col rounded-xl p-6">
                    <img class="h-32" src="{{ asset('img/feature/tracking.svg') }}" alt="">
                </div>
                <div class="flex flex-col lg:gap-2 xs:gap-1 w-full mx-auto">
                    <a href={{ url('/tracking') }} class="text-white text-center font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-xl w-full">Cek Status Pengajuan</a>                    
                </div>
            </div>                       
        </div>
    </div>
</section>