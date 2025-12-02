<section id="footer" class="w-full relative bg-gradient-to-b from-apple-600 to-apple-900 mt-10 p-8 overflow-hidden z-0">
    <img src="{{ asset('img/geolines.svg') }}" alt="" class="absolute opacity-15 mx-auto lg:h-[800px] xs:h-[580px] w-full lg:-bottom-48 xs:-bottom-56 left-0 z-0">
      <div class="max-w-5xl mx-auto w-full py-10 flex flex-col justify-center items-center gap-x-10">        
        <div class=" flex flex-col lg:max-w-lg xs:max-w-9/10 w-full justify-center items-center gap-y-7 z-20">

          {{-- Logo --}}
          <img class="w-36 bg-white backdrop-blur-xs px-3 py-1.5 rounded-lg" src="{{ asset('img/logo.svg') }}" alt="logo">                      
          <div class="flex flex-col lg:max-w-lg xs:w-full gap-y-2">              
              <p class="text-sm text-center leading-loose text-apple-50 font-display">Sistem Validasi Pengajuan Praktik Kerja Lapangan yang dikembangkan berdasarkan experience mahasiswa dalam mengajukan Praktik Kerja Lapangan</p>
          </div>

          {{-- Contact --}}
          <div class="flex flex-row gap-x-4">

            {{-- Phone --}}
            <a href="#" class="group">
              <div class="relative bg-apple-100/10 backdrop-blur-xs rounded-lg flex-col py-6 px-6 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute bottom-3 left-3 size-6 text-white group-hover:-translate-y-1 group-hover:transform duration-300 ease-in-out">
                    <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                </svg>
                <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 border-b-4 text-center flex border-white rounded-lg mx-auto w-3 mt-1.5 group-hover:w-5 group-hover:transform duration-100 ease-in-out"></span>
              </div>
            </a>
            
            {{-- Instagram --}}
            <a href="#" class="group">
              <div class="relative bg-apple-100/10 backdrop-blur-xs rounded-lg flex-col py-6 px-6 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute bottom-3 left-3 size-6 text-white group-hover:-translate-y-1 group-hover:transform duration-300 ease-in-out">
                    <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                    <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                </svg>
                <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 border-b-4 text-center flex border-white rounded-lg mx-auto w-3 mt-1.5 group-hover:w-5 group-hover:transform duration-100 ease-in-out"></span>
              </div>
            </a>                        
            
            {{-- Web --}}
            <a href="#" class="group">
              <div class="relative bg-apple-100/10 backdrop-blur-xs rounded-lg flex-col py-6 px-6 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute bottom-3 left-3 size-6 text-white group-hover:-translate-y-1 group-hover:transform duration-300 ease-in-out">
                    <path d="M21.721 12.752a9.711 9.711 0 0 0-.945-5.003 12.754 12.754 0 0 1-4.339 2.708 18.991 18.991 0 0 1-.214 4.772 17.165 17.165 0 0 0 5.498-2.477ZM14.634 15.55a17.324 17.324 0 0 0 .332-4.647c-.952.227-1.945.347-2.966.347-1.021 0-2.014-.12-2.966-.347a17.515 17.515 0 0 0 .332 4.647 17.385 17.385 0 0 0 5.268 0ZM9.772 17.119a18.963 18.963 0 0 0 4.456 0A17.182 17.182 0 0 1 12 21.724a17.18 17.18 0 0 1-2.228-4.605ZM7.777 15.23a18.87 18.87 0 0 1-.214-4.774 12.753 12.753 0 0 1-4.34-2.708 9.711 9.711 0 0 0-.944 5.004 17.165 17.165 0 0 0 5.498 2.477ZM21.356 14.752a9.765 9.765 0 0 1-7.478 6.817 18.64 18.64 0 0 0 1.988-4.718 18.627 18.627 0 0 0 5.49-2.098ZM2.644 14.752c1.682.971 3.53 1.688 5.49 2.099a18.64 18.64 0 0 0 1.988 4.718 9.765 9.765 0 0 1-7.478-6.816ZM13.878 2.43a9.755 9.755 0 0 1 6.116 3.986 11.267 11.267 0 0 1-3.746 2.504 18.63 18.63 0 0 0-2.37-6.49ZM12 2.276a17.152 17.152 0 0 1 2.805 7.121c-.897.23-1.837.353-2.805.353-.968 0-1.908-.122-2.805-.353A17.151 17.151 0 0 1 12 2.276ZM10.122 2.43a18.629 18.629 0 0 0-2.37 6.49 11.266 11.266 0 0 1-3.746-2.504 9.754 9.754 0 0 1 6.116-3.985Z" />
                </svg>
                <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 border-b-4 text-center flex border-white rounded-lg mx-auto w-3 mt-1.5 group-hover:w-5 group-hover:transform duration-100 ease-in-out"></span>
              </div>
            </a>              
          </div>

        </div>        
      </div>

      {{-- Copyright --}}
      <div class="mt-2 flex items-center justify-center gap-x-6">                  
        <h3 class="text-xs text-center text-white/50 font-display"><span>&#169</span> 2024 Internval 1.0 - All Rights Reserved</h3>
      </div>

</section>