@extends('layout.layout')

@push('vite_script')
    @vite(['resources/js/copy.js'])    
@endpush

@section('title', 'Submission Form')
@section('content')

    <x-navbar></x-navbar>
    <section class="lg:max-w-4xl xs:max-w-9/10 w-full mx-auto flex flex-col justify-center items-center mt-28 mb-20">

        {{-- Judul --}}
        <div class="flex flex-col justify-center items-center gap-1">
            <h1 class="text-apple-600 lg:text-3xl xs:text-2xl font-bold font-display text-center w-full">Formulir Pengajuan</h1>
            <p class="text-gray-400 text-sm font-display text-center w-full">Baca peraturan mengenai Praktik Kerja Lapangan sebelum melakukan pengajuan</p>        
        </div>

        {{-- Modal Success --}}
        @if(session('success_id'))
            <!-- Modal Overlay -->
            <div 
                x-data="{ open: true }" 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-lg z-50 min-h-screen"
            >
                
                {{-- <div class="bg-white backdrop-blur-lg p-4 rounded-xl lg:max-w-xs xs:max-w-9/10 w-full text-center ring ring-apple-600 relative z-60">
                    <!-- Gambar -->
                    <div class="bg-apple-900/10 p-2 rounded-xl">
                        <img src="{{ asset('img/successub.svg') }}" alt="" class="h-36 mx-auto">
                    </div>

                    <!-- Konten Modal -->
                    <div class="mt-4">
                        <h2 class="text-lg font-display font-bold text-apple-600 mb-2">Pengajuan Berhasil!</h2>
                        <p class="font-display text-xs text-gray-400 mb-1">Klik untuk menyalin ID</p>
                        
                        <div class="w-full mt-2 mb-4">
                            <div class="relative">
                                <label for="npm-install-copy-button" class="sr-only">Label</label>
                                <input id="npm-install-copy-button" type="text" class="font-display bg-gray-50 border border-apple-600 text-gray-800 text-center text-sm block w-full p-2.5 rounded-lg" value={{ session('success_id') }} disabled readonly>
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

                        <!-- Tombol Tutup -->
                        <button 
                            @click="open = false" 
                            class="text-white font-display font-bold bg-gradient-to-b from-apple-600 to-apple-700 hover:from-apple-700 hover:to-apple-900 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-md w-full cursor-pointer"
                        >
                            Tutup
                        </button>
                    </div>
                </div> --}}
                <div class="bg-white backdrop-blur-lg p-4 rounded-xl lg:max-w-xs xs:max-w-9/10 w-full text-center relative z-60">

                    {{-- Close --}}
                    <button 
                            @click="open = false" 
                            class="flex justify-end w-full cursor-pointer"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-400 hover:text-gray-800 transition duration-300 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Gambar -->
                    <div class="bg-apple-900/10 p-2.5 rounded-full w-fit mx-auto mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-apple-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>                        
                    </div>

                    <!-- Konten Modal -->
                    <div class="mt-4">
                        <h2 class="text-base font-display font-bold text-apple-600 mb-1">Pengajuan Terkirim !</h2>
                        <p class="font-display text-xs text-gray-400 mb-1">Salin ID untuk melakukan tracking</p>
                        
                        <div class="w-full mt-4 mb-1">
                            <div class="relative">
                                <label for="npm-install-copy-button" class="sr-only">Label</label>
                                <input id="npm-install-copy-button" type="text" class="font-display bg-gray-50  text-gray-800 text-center border border-gray-300 text-sm block w-full p-2.5 rounded-lg" value={{ session('success_id') }} disabled readonly>
                                <button data-copy-to-clipboard-target="npm-install-copy-button" data-tooltip-target="tooltip-copy-npm-install-copy-button" class="absolute cursor-pointer end-2 top-1/2 -translate-y-1/2 text-gray-500 bg-apple-600  hover:bg-apple-700 transition duration-200 ease-in-out rounded-lg p-2 inline-flex items-center justify-center">
                                    <span id="default-icon">
                                        <svg class="w-3.5 h-3.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                                        </svg>
                                    </span>
                                    <span id="success-icon" class="hidden">
                                        <svg class="w-3.5 h-3.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
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
                    </div>
                </div>
            </div>
        @endif

        {{-- Modal NIM Limit --}}
        @if(session('nim_limit'))
            <div 
                x-data="{ open: true }" 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-lg z-50 min-h-screen"
            >
                <div class="bg-white p-4 rounded-xl lg:max-w-xs xs:max-w-9/10 w-full text-center relative">
                    

                    {{-- Icon Warning --}}
                    <div class="bg-red-100 p-3 rounded-full w-fit mx-auto mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg> 
                    </div>

                    {{-- Pesan --}}
                    <div class="mt-4">
                        <h2 class="text-base font-display font-semibold text-gray-800 mb-1">Batas Pengajuan Terpenuhi!</h2>
                        <p class="font-display text-xs text-gray-400 mb-1">Anda sudah melakukan pengajuan sebanyak 2 kali, lakukan pengajuan manual</p>                                           

                        <!-- Tombol Tutup -->
                        <button 
                            @click="open = false" 
                            class="flex mt-4 justify-center items-center text-white text-center w-full cursor-pointer font-display font-bold bg-red-600 hover:bg-red-600/90 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-lg inset-ring inset-ring-red-700/20 outline -outline-offset-2 outline-red-500/30 shadow-md shadow-red-700/40 inset-shadow-[0_-3px_4px] inset-shadow-red-700/80"
                        >
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endif

        {{-- Modal Need Kaprodi --}}
        @if(session('need_kaprodi'))
            <div 
                x-data="{ open: true }" 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-lg z-50 min-h-screen"
            >
                <div class="bg-white p-4 rounded-xl lg:max-w-xs xs:max-w-9/10 w-full text-center relative">
                    

                    {{-- Icon Warning --}}
                    <div class="bg-red-100 p-3 rounded-full w-fit mx-auto mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg> 
                    </div>

                    {{-- Pesan --}}
                    <div class="mt-4">
                        <h2 class="text-base font-display font-semibold text-gray-800 mb-1">Satu Pengajuan sudah dilakukan!</h2>
                        <p class="font-display text-xs text-gray-400 mb-1">Hubungi Kaprodi untuk membuka akses pengajuan yang baru</p>                                           

                        <!-- Tombol Tutup -->
                        <button 
                            @click="open = false" 
                            class="flex mt-4 justify-center items-center text-white text-center w-full cursor-pointer font-display font-bold bg-red-600 hover:bg-red-600/90 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-lg inset-ring inset-ring-red-700/20 outline -outline-offset-2 outline-red-500/30 shadow-md shadow-red-700/40 inset-shadow-[0_-3px_4px] inset-shadow-red-700/80"
                        >
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endif

        {{-- Modal NIM Not Allowed --}}
        @if(session('nim_not_allowed'))
            <div 
                x-data="{ open: true }" 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-lg z-50 min-h-screen"
            >
                <div class="bg-white p-4 rounded-xl lg:max-w-xs xs:max-w-9/10 w-full text-center relative">
                    

                    {{-- Icon Warning --}}
                    <div class="bg-red-100 p-3 rounded-full w-fit mx-auto mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg> 
                    </div>

                    {{-- Pesan --}}
                    <div class="mt-4">
                        <h2 class="text-base font-display font-semibold text-gray-800 mb-1">Pengajuan Tidak Diperbolehkan!</h2>
                        <p class="font-display text-xs text-gray-400 mb-1">Anda belum terdaftar sebagai mahasiswa yang diijinkan</p>                                           

                        <!-- Tombol Tutup -->
                        <button 
                            @click="open = false" 
                            class="flex mt-4 justify-center items-center text-white text-center w-full cursor-pointer font-display font-bold bg-red-600 hover:bg-red-600/90 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-lg inset-ring inset-ring-red-700/20 outline -outline-offset-2 outline-red-500/30 shadow-md shadow-red-700/40 inset-shadow-[0_-3px_4px] inset-shadow-red-700/80"
                        >
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endif
        
        {{-- Form Submission --}}
        <form x-data="formHandler" x-on:submit.prevent="validateAndSubmit" novalidate method="POST" action="{{ route('submission.submit') }}" class="mt-8 mb-10 w-full gap-6">
            @csrf

            {{-- data mahasiswa --}}
            <div class="border-b border-gray-900/10 pb-12 grid lg:grid-cols-6 xs:grid-cols-1 gap-6">
                <div class="col-span-full">
                    <h2 class="text-gray-800 text-left w-full font-bold font-display">Data Mahasiswa</h2>
                    <p class="text-gray-400 text-xs text-left w-full font-display">Form dengan tanda ( <span class="text-gray-400">*</span> ) wajib diisi</p>
                </div>
    
                <div class="col-span-3">
                    <label for="nama_mahasiswa" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Nama <span class="text-gray-400">*</span></label>            
                    <input name="nama_mahasiswa" id="nama_mahasiswa" type="text" pattern="[A-Za-z\s]+" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase()" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="Nama Lengkap" required autocomplete="off"/>
                </div>           
                
                <div class="col-span-3">
                    <label for="nim" class="block mb-2 text-xs font-display text-apple-600 font-semibold">NIM <span class="text-gray-400">*</span></label>            
                    <input name="nim" id="nim" type="text" pattern="[0-9]{12}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="12" maxlength="12" class="decoration-none bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="Nomor Induk Mahasiswa" required autocomplete="off"/>
                </div>
    
                <div class="col-span-3">
                    <label for="prodi" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Prodi <span class="text-gray-400">*</span></label>                                
                    <div 
                        x-data="{
                            selectOpen: false,
                            selectedItem: null,
                            selectableItems: [
                                { title: 'S1 Informatika', value: 'S1 Informatika', disabled: false },
                                { title: 'S1 Teknik Mesin', value: 'S1 Teknik Mesin', disabled: false },
                                { title: 'D3 Manajemen Informatika', value: 'D3 Manajemen Informatika', disabled: false },
                            ],
                            selectableItemActive: null,
                            selectId: $id('select'),
                            selectDropdownPosition: 'bottom',
                            selectScrollToActiveItem() {
                                if (this.selectableItemActive) {
                                    const activeElement = document.getElementById(this.selectableItemActive.value + '-' + this.selectId)
                                    const newScrollPos = (activeElement.offsetTop + activeElement.offsetHeight) - this.$refs.selectableItemsList.offsetHeight;
                                    this.$refs.selectableItemsList.scrollTop = newScrollPos > 0 ? newScrollPos : 0;
                                }
                            },
                            selectableItemIsActive(item) {
                                return this.selectableItemActive && this.selectableItemActive.value === item.value;
                            },
                            selectableItemActiveNext() {
                                const index = this.selectableItems.indexOf(this.selectableItemActive);
                                if (index < this.selectableItems.length - 1) {
                                    this.selectableItemActive = this.selectableItems[index + 1];
                                    this.selectScrollToActiveItem();
                                }
                            },
                            selectableItemActivePrevious() {
                                const index = this.selectableItems.indexOf(this.selectableItemActive);
                                if (index > 0) {
                                    this.selectableItemActive = this.selectableItems[index - 1];
                                    this.selectScrollToActiveItem();
                                }
                            },
                            selectPositionUpdate() {
                                const bottomPos = this.$refs.selectButton.getBoundingClientRect().top + this.$refs.selectButton.offsetHeight + parseInt(window.getComputedStyle(this.$refs.selectableItemsList).maxHeight);
                                this.selectDropdownPosition = window.innerHeight < bottomPos ? 'top' : 'bottom';
                            }
                        }"
                        x-init="
                            $watch('selectOpen', function() {
                                if (!selectedItem) {
                                    selectableItemActive = selectableItems[0];
                                } else {
                                    selectableItemActive = selectedItem;
                                }
                                setTimeout(() => selectScrollToActiveItem(), 10);
                                selectPositionUpdate();
                                window.addEventListener('resize', () => selectPositionUpdate());
                            });
                        "
                        class="relative w-full"
                    >
                        <!-- Tombol Dropdown -->
                        <button 
                            x-ref="selectButton" 
                            @click="selectOpen = !selectOpen"
                            type="button"
                            class="relative flex justify-between bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:outline-1 focus:ring-1 focus:ring-apple-600 focus:outline-apple-600 focus:border-apple-400 w-full p-2.5"
                        >
                            <span x-text="selectedItem ? selectedItem.title : 'Pilih Program Studi'" class="truncate"></span>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>

                        <!-- Dropdown List -->
                        <ul 
                            x-show="selectOpen"
                            x-ref="selectableItemsList"
                            @click.away="selectOpen = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            :class="{ 'bottom-0 mb-11': selectDropdownPosition == 'top', 'top-0 mt-11': selectDropdownPosition == 'bottom' }"
                            class="absolute w-full py-1 mt-1 overflow-auto text-xs bg-white rounded-md shadow-md max-h-56 border border-gray-200 focus:outline-none z-10"
                            x-cloak
                        >
                            <template x-for="item in selectableItems" :key="item.value">
                                <li 
                                    @click="
                                        selectedItem = item;
                                        selectOpen = false;
                                        $refs.hiddenSelect.value = item.value;  // set value hidden input
                                        $refs.selectButton.focus();
                                    "
                                    :id="item.value + '-' + selectId"
                                    :class="{ 'bg-gray-100 text-gray-900': selectableItemIsActive(item) }"
                                    @mousemove="selectableItemActive = item"
                                    class="relative flex items-center h-full py-2 pl-8 text-gray-700 cursor-pointer select-none hover:bg-gray-50"
                                >
                                    <svg 
                                        x-show="selectedItem && selectedItem.value === item.value" 
                                        class="absolute left-0 w-3.5 h-3.5 ml-2 stroke-current text-green-500" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="2" 
                                        stroke-linecap="round" 
                                        stroke-linejoin="round"
                                    >
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="block font-medium font-display truncate" x-text="item.title"></span>
                                </li>
                            </template>
                        </ul>

                        <!-- Hidden input agar tetap dikirim ke backend -->
                        <input type="hidden" name="prodi" x-ref="hiddenSelect" required >
                    </div>

                </div>     

                <div class="col-span-3">
                    <label for="jenis_kelamin" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Jenis Kelamin <span class="text-gray-400">*</span></label>                                
                    <div 
                        x-data="{
                            selectOpen: false,
                            selectedItem: null,
                            selectableItems: [
                                { title: 'Laki-laki', value: 'laki-laki', disabled: false },
                                { title: 'Perempuan', value: 'perempuan', disabled: false },
                            ],
                            selectableItemActive: null,
                            selectId: $id('select'),
                            selectDropdownPosition: 'bottom',
                            selectScrollToActiveItem() {
                                if (this.selectableItemActive) {
                                    const activeElement = document.getElementById(this.selectableItemActive.value + '-' + this.selectId)
                                    const newScrollPos = (activeElement.offsetTop + activeElement.offsetHeight) - this.$refs.selectableItemsList.offsetHeight;
                                    this.$refs.selectableItemsList.scrollTop = newScrollPos > 0 ? newScrollPos : 0;
                                }
                            },
                            selectableItemIsActive(item) {
                                return this.selectableItemActive && this.selectableItemActive.value === item.value;
                            },
                            selectableItemActiveNext() {
                                const index = this.selectableItems.indexOf(this.selectableItemActive);
                                if (index < this.selectableItems.length - 1) {
                                    this.selectableItemActive = this.selectableItems[index + 1];
                                    this.selectScrollToActiveItem();
                                }
                            },
                            selectableItemActivePrevious() {
                                const index = this.selectableItems.indexOf(this.selectableItemActive);
                                if (index > 0) {
                                    this.selectableItemActive = this.selectableItems[index - 1];
                                    this.selectScrollToActiveItem();
                                }
                            },
                            selectPositionUpdate() {
                                const bottomPos = this.$refs.selectButton.getBoundingClientRect().top + this.$refs.selectButton.offsetHeight + parseInt(window.getComputedStyle(this.$refs.selectableItemsList).maxHeight);
                                this.selectDropdownPosition = window.innerHeight < bottomPos ? 'top' : 'bottom';
                            }
                        }"
                        x-init="
                            $watch('selectOpen', function() {
                                if (!selectedItem) {
                                    selectableItemActive = selectableItems[0];
                                } else {
                                    selectableItemActive = selectedItem;
                                }
                                setTimeout(() => selectScrollToActiveItem(), 10);
                                selectPositionUpdate();
                                window.addEventListener('resize', () => selectPositionUpdate());
                            });
                        "
                        class="relative w-full"
                    >
                        <!-- Tombol Dropdown -->
                        <button 
                            x-ref="selectButton" 
                            @click="selectOpen = !selectOpen"
                            type="button"
                            class="relative flex justify-between bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:outline-1 focus:ring-1 focus:ring-apple-600 focus:outline-apple-600 focus:border-apple-400 w-full p-2.5"
                        >
                            <span x-text="selectedItem ? selectedItem.title : 'Jenis Kelamin'" class="truncate"></span>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>

                        <!-- Dropdown List -->
                        <ul 
                            x-show="selectOpen"
                            x-ref="selectableItemsList"
                            @click.away="selectOpen = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            :class="{ 'bottom-0 mb-11': selectDropdownPosition == 'top', 'top-0 mt-11': selectDropdownPosition == 'bottom' }"
                            class="absolute w-full py-1 mt-1 overflow-auto text-xs bg-white rounded-md shadow-md max-h-56 border border-gray-200 focus:outline-none z-10"
                            x-cloak
                        >
                            <template x-for="item in selectableItems" :key="item.value">
                                <li 
                                    @click="
                                        selectedItem = item;
                                        selectOpen = false;
                                        $refs.hiddenSelect.value = item.value;  // set value hidden input
                                        $refs.selectButton.focus();
                                    "
                                    :id="item.value + '-' + selectId"
                                    :class="{ 'bg-gray-100 text-gray-900': selectableItemIsActive(item) }"
                                    @mousemove="selectableItemActive = item"
                                    class="relative flex items-center h-full py-2 pl-8 text-gray-700 cursor-pointer select-none hover:bg-gray-50"
                                >
                                    <svg 
                                        x-show="selectedItem && selectedItem.value === item.value" 
                                        class="absolute left-0 w-3.5 h-3.5 ml-2 stroke-current text-green-500" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="2" 
                                        stroke-linecap="round" 
                                        stroke-linejoin="round"
                                    >
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="block font-medium font-display truncate" x-text="item.title"></span>
                                </li>
                            </template>
                        </ul>

                        <!-- Hidden input agar tetap dikirim ke backend -->
                        <input type="hidden" name="jenis_kelamin" x-ref="hiddenSelect" required >
                    </div>

                </div>

                <div class="col-span-3">
                    <label for="telepon" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Telepon <span class="text-gray-400">*</span></label>            
                    <input name="telepon" id="telepon" type="text" pattern="[0-9]{15}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="10" maxlength="15" class="decoration-none bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="xxxx-xxxx-xxxx" required autocomplete="off"/>
                </div>

                <div class="col-span-3">
                    <label for="email" class="block mb-2 text-xs font-display text-apple-600 font-semibold">E-mail <span class="text-gray-400">*</span></label>            
                    <input name="email" id="email" type="email" class="decoration-none bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="Example@gmail.com" required autocomplete="off"/>
                </div>

                <div class="col-span-3">
                    <label for="tempat_lahir" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Tempat Lahir <span class="text-gray-400">*</span></label>            
                    <input name="tempat_lahir" id="tempat_lahir" type="text" pattern="[A-Za-z\s]+" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase()" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="Tempat Lahir" required autocomplete="off"/>
                </div>

                <div class="col-span-3" 
                    x-data="{
                        datePickerOpen: false,
                        datePickerValue: '',
                        datePickerFormat: 'YYYY-MM-DD',
                        datePickerMonth: '',
                        datePickerYear: '',
                        datePickerDay: '',
                        datePickerDaysInMonth: [],
                        datePickerBlankDaysInMonth: [],
                        datePickerMonthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
                        datePickerDays: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],

                        // view: date / year
                        datePickerView: 'date',

                        // year picker
                        yearPickerStart: 0,

                        openYearPicker() {
                            this.datePickerView = 'year';
                            this.yearPickerStart = Math.floor(this.datePickerYear / 12) * 12;
                        },
                        selectYear(year) {
                            this.datePickerYear = year;
                            this.datePickerCalculateDays();
                            this.datePickerView = 'date';
                        },
                        prevYearRange() {
                            this.yearPickerStart -= 12;
                        },
                        nextYearRange() {
                            this.yearPickerStart += 12;
                        },

                        // day click
                        datePickerDayClicked(day) {
                            let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
                            this.datePickerDay = day;
                            this.datePickerValue = this.datePickerFormatDate(selectedDate);
                            this.datePickerOpen = false;
                        },

                        // month nav
                        datePickerPreviousMonth(){
                            if (this.datePickerMonth == 0) {
                                this.datePickerYear--;
                                this.datePickerMonth = 11;
                            } else {
                                this.datePickerMonth--;
                            }
                            this.datePickerCalculateDays();
                        },
                        datePickerNextMonth(){
                            if (this.datePickerMonth == 11) {
                                this.datePickerMonth = 0;
                                this.datePickerYear++;
                            } else {
                                this.datePickerMonth++;
                            }
                            this.datePickerCalculateDays();
                        },

                        datePickerIsSelectedDate(day) {
                            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
                            return this.datePickerValue === this.datePickerFormatDate(d);
                        },
                        datePickerIsToday(day) {
                            const today = new Date();
                            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
                            return today.toDateString() === d.toDateString();
                        },

                        datePickerCalculateDays() {
                            let daysInMonth = new Date(this.datePickerYear, this.datePickerMonth + 1, 0).getDate();
                            let dayOfWeek = new Date(this.datePickerYear, this.datePickerMonth).getDay();
                            this.datePickerBlankDaysInMonth = Array.from({length: dayOfWeek}, (_, i) => i + 1);
                            this.datePickerDaysInMonth = Array.from({length: daysInMonth}, (_, i) => i + 1);
                        },
                        datePickerFormatDate(date) {
                            let dd = ('0' + date.getDate()).slice(-2);
                            let mm = ('0' + (date.getMonth() + 1)).slice(-2);
                            let yyyy = date.getFullYear();
                            return `${yyyy}-${mm}-${dd}`;
                        },
                    }"
                    x-init="
                        let currentDate = new Date();
                        datePickerMonth = currentDate.getMonth();
                        datePickerYear = currentDate.getFullYear();
                        datePickerValue = datePickerFormatDate(currentDate);
                        datePickerCalculateDays();
                    " x-cloak>

                    <label for="tanggal_lahir" class="block mb-2 text-xs font-display text-apple-600 font-semibold">
                        Tanggal Lahir <span class="text-gray-400">*</span>
                    </label>

                    <div class="relative w-full">
                        <input x-ref="datePickerInput" type="text" @click="datePickerOpen = !datePickerOpen" 
                            x-model="datePickerValue" readonly
                            class="flex p-2.5 w-full text-xs bg-white rounded-lg border text-neutral-600 border-neutral-300 placeholder:text-neutral-400 focus:ring-apple-600 focus:border-apple-400"
                            placeholder="Pilih tanggal" />

                        <input type="hidden" name="tanggal_lahir" x-model="datePickerValue" />

                        <div 
                            @click="datePickerOpen = !datePickerOpen; $refs.datePickerInput.focus()" 
                            class="absolute top-0 right-0 h-full flex items-center pr-3 text-neutral-400 cursor-pointer hover:text-apple-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <div x-show="datePickerOpen" x-transition @click.away="datePickerOpen = false; datePickerView = 'date';" 
                            class="absolute z-20 top-12 left-0 p-4 bg-white border border-gray-200 rounded-lg shadow-lg w-full">


                            <!-- 🔵 CHANGE START — HEADER DATE MODE ONLY -->
                            <div class="flex justify-between items-center mb-2" 
                                x-show="datePickerView === 'date'">

                                <div>
                                    <span x-text="datePickerMonthNames[datePickerMonth]" 
                                        class="font-display font-extrabold text-gray-800"></span>

                                    <span 
                                        x-text="datePickerYear" 
                                        class="ml-1 font-display text-sm text-gray-600 cursor-pointer hover:text-apple-600"
                                        @click.stop="openYearPicker()"></span>
                                </div>

                                <div>
                                    <button @click="datePickerPreviousMonth()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                    </button>
                                    <button @click="datePickerNextMonth()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- 🔵 CHANGE END -->


                            <!-- DATE VIEW -->
                            <div x-show="datePickerView === 'date'">
                                <div class="grid grid-cols-7 text-center text-[10px] font-display font-semibold text-gray-500 mb-1">
                                    <template x-for="(day, index) in datePickerDays" :key="index">
                                        <div x-text="day"></div>
                                    </template>
                                </div>

                                <div class="grid grid-cols-7 text-xs">
                                    <template x-for="blankDay in datePickerBlankDaysInMonth">
                                        <div class="p-1"></div>
                                    </template>
                                    <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                                        <div class="p-1">
                                            <div 
                                                x-text="day"
                                                @click="datePickerDayClicked(day)" 
                                                :class="{
                                                    'bg-apple-600 text-white': datePickerIsSelectedDate(day),
                                                    'hover:bg-gray-100 text-gray-600': !datePickerIsSelectedDate(day)
                                                }"
                                                class="cursor-pointer font-display rounded-full w-6 h-6 flex items-center justify-center mx-auto">
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>


                            <!-- 🔵 CHANGE START — YEAR PICKER ONLY VIEW -->
                            <div x-show="datePickerView === 'year'" class="pt-2">

                                <div class="flex justify-between items-center mb-2">

                                    <button @click="prevYearRange()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                    </button>

                                    <span class="font-semibold font-display text-gray-700">
                                        <span x-text="yearPickerStart"></span> - <span x-text="yearPickerStart + 11"></span>
                                    </span>

                                    <button @click="nextYearRange()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>

                                </div>

                                <div class="grid grid-cols-3 gap-2 text-sm">
                                    <template x-for="i in 12" :key="i">
                                        <div class="cursor-pointer px-2 py-1 rounded hover:bg-gray-100 text-center"
                                            @click="selectYear(yearPickerStart + i - 1)">
                                            <span class="font-display text-gray-500" x-text="yearPickerStart + i - 1"></span>
                                        </div>
                                    </template>
                                </div>

                            </div>
                            <!-- 🔵 CHANGE END -->

                        </div>
                    </div>
                </div>

                <div class="col-span-3">
                    <label for="alamat" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Alamat <span class="text-gray-400">*</span></label>            
                    <input name="alamat" id="alamat" type="text" pattern="[A-Za-z\s]+" oninput="this.value = this.value.replace(/[^a-zA-Z\s.,]/g, '').toUpperCase()" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="Alamat Tinggal" required autocomplete="off"/>
                </div>

                <div class="col-span-3">
                    <label for="judul_laporan" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Judul Laporan <span class="text-gray-400">*</span></label>            
                    <input name="judul_laporan" id="judul_laporan" type="text" pattern="[A-Za-z\s-]+" oninput="this.value = this.value.replace(/[^a-zA-Z\s-]/g, '').toUpperCase()" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="Isi dengan simbol ( - ) jika belum memiliki judul" required autocomplete="off"/>
                </div>


            </div>
            
            {{-- data instansi --}}
            <div class="border-b border-gray-900/10 pb-12 grid lg:grid-cols-6 xs:grid-cols-1 gap-6 mt-10">
                <div class="col-span-full">
                    <h2 class="text-gray-800 text-left w-full font-bold font-display">Data Instansi / Perusahaan / Lembaga</h2>
                    <p class="text-gray-400 text-xs text-left w-full font-display">Form dengan tanda ( <span class="text-gray-400">*</span> ) wajib diisi</p>
                </div>
    
                <div class="col-span-3">
                    <label for="instansi_tujuan" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Instansi Tujuan <span class="text-gray-400">*</span></label>            
                    <input name="instansi_tujuan" id="instansi_tujuan" type="text" pattern="[A-Za-z\s.]+" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').toUpperCase()" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="Nama Instansi / Perusahaan / Lembaga" required autocomplete="off"/>
                </div>

                <div class="col-span-3">
                    <label for="provinsi" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Provinsi <span class="text-gray-400">*</span></label>            
                    <div 
                        x-data="{
                            selectOpen: false,
                            selectedItem: null,
                            selectableItems: {{ \Indonesia::allProvinces()->map(fn($p) => ['title' => $p->name, 'value' => $p->code]) }},
                            setItem(item) {
                                this.selectedItem = item;
                                this.selectOpen = false;
                                this.$refs.hiddenSelect.value = item.value;
                                this.$refs.hiddenSelect.dispatchEvent(new Event('change'));
                            }
                        }"
                        class="relative w-full"
                    >                        
                        
                        <button 
                            type="button"
                            @click="selectOpen = !selectOpen"
                            class="relative flex justify-between bg-gray-50 border border-gray-300 font-display text-xs rounded-lg w-full p-2.5 focus:outline focus:outline-apple-600 focus:ring focus:ring-apple-600 focus:border-apple-400"
                        >
                            <span x-text="selectedItem ? selectedItem.title : '-- Pilih Provinsi --'" class="truncate"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute right-2 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul 
                            x-show="selectOpen"
                            x-transition
                            class="absolute w-full py-1 mt-1 bg-white rounded-md shadow-md max-h-56 overflow-auto border border-gray-200 z-10"
                            x-cloak
                        >
                            <template x-for="item in selectableItems" :key="item.value">
                                <li 
                                    @click="setItem(item)"
                                    class="py-2 pl-8 pr-2 text-xs text-gray-700 cursor-pointer hover:bg-gray-50 relative"
                                >
                                    <svg 
                                        x-show="selectedItem && selectedItem.value === item.value" 
                                        class="absolute left-2 w-3.5 h-3.5 text-green-500" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="2" 
                                        stroke-linecap="round" 
                                        stroke-linejoin="round"
                                    >
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="font-display font-medium text-xs" x-text="item.title"></span>
                                </li>
                            </template>
                        </ul>

                        <input type="hidden" id="provinsi" name="provinsi" x-ref="hiddenSelect" required >
                    </div>                                                                        
                </div>

                <div class="col-span-3">
                    <label for="kabupaten_kota" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Kabupaten / Kota <span class="text-gray-400">*</span></label>            
                    <div 
                        x-data="{
                            selectOpen: false,
                            selectedItem: null,
                            selectableItems: [],
                            setItem(item) {
                                this.selectedItem = item;
                                this.selectOpen = false;
                                this.$refs.hiddenSelect.value = item.value;
                                this.$refs.hiddenSelect.dispatchEvent(new Event('change'));
                            },
                            updateItems(data) {
                                this.selectableItems = data.map(i => ({ title: i.name, value: i.code }));
                            }
                        }"
                        x-init="
                            const kabupatenInput = $refs.hiddenSelect;
                            const provinsiInput = document.getElementById('provinsi');
                            provinsiInput.addEventListener('change', async (e) => {
                                kabupatenInput.value = '';
                                selectedItem = null;
                                selectableItems = [];
                                const response = await fetch(`/get-kabupaten?provinsi_id=${e.target.value}`);
                                const data = await response.json();
                                updateItems(data);
                            });
                        "
                        class="relative w-full"
                    >                        

                        <button type="button"
                            @click="selectOpen = !selectOpen"
                            class="relative flex justify-between bg-gray-50 border border-gray-300 font-display text-xs rounded-lg w-full p-2.5 focus:outline focus:outline-apple-600 focus:ring focus:ring-apple-600 focus:border-apple-400"
                        >
                            <span x-text="selectedItem ? selectedItem.title : '-- Pilih Kabupaten/Kota --'" class="truncate"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute right-2 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul x-show="selectOpen" x-transition class="absolute w-full py-1 mt-1 bg-white rounded-md shadow-md max-h-56 overflow-auto border border-gray-200 z-10" x-cloak>
                            <template x-for="item in selectableItems" :key="item.value">
                                <li @click="setItem(item)" class="py-2 pl-8 pr-2 text-xs text-gray-700 cursor-pointer hover:bg-gray-50 relative">
                                    <svg x-show="selectedItem && selectedItem.value === item.value" class="absolute left-2 w-3.5 h-3.5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="font-display font-medium text-xs" x-text="item.title"></span>
                                </li>
                            </template>
                        </ul>

                        <input type="hidden" id="kabupaten_kota" name="kabupaten_kota" x-ref="hiddenSelect" required >
                    </div>                  
                </div>

                <div class="col-span-3">
                    <label for="kecamatan" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Kecamatan <span class="text-gray-400">*</span></label>            
                    <div 
                        x-data="{
                            selectOpen: false,
                            selectedItem: null,
                            selectableItems: [],
                            setItem(item) {
                                this.selectedItem = item;
                                this.selectOpen = false;
                                this.$refs.hiddenSelect.value = item.value;
                                this.$refs.hiddenSelect.dispatchEvent(new Event('change'));
                            },
                            updateItems(data) {
                                this.selectableItems = data.map(i => ({ title: i.name, value: i.code }));
                            }
                        }"
                        x-init="
                            const kecamatanInput = $refs.hiddenSelect;
                            const kabupatenInput = document.getElementById('kabupaten_kota');
                            kabupatenInput.addEventListener('change', async (e) => {
                                kecamatanInput.value = '';
                                selectedItem = null;
                                selectableItems = [];
                                const response = await fetch(`/get-kecamatan?kabupaten_id=${e.target.value}`);
                                const data = await response.json();
                                updateItems(data);
                            });
                        "
                        class="relative w-full"
                    >                        

                        <button type="button"
                            @click="selectOpen = !selectOpen"
                            class="relative flex justify-between bg-gray-50 border border-gray-300 font-display text-xs rounded-lg w-full p-2.5 focus:outline focus:outline-apple-600 focus:ring focus:ring-apple-600 focus:border-apple-400"
                        >
                            <span x-text="selectedItem ? selectedItem.title : '-- Pilih Kecamatan --'" class="truncate"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute right-2 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul x-show="selectOpen" x-transition class="absolute w-full py-1 mt-1 bg-white rounded-md shadow-md max-h-56 overflow-auto border border-gray-200 z-10" x-cloak>
                            <template x-for="item in selectableItems" :key="item.value">
                                <li @click="setItem(item)" class="py-2 pl-8 pr-2 text-xs text-gray-700 cursor-pointer hover:bg-gray-50 relative">
                                    <svg x-show="selectedItem && selectedItem.value === item.value" class="absolute left-2 w-3.5 h-3.5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="font-display font-medium text-xs" x-text="item.title"></span>
                                </li>
                            </template>
                        </ul>

                        <input type="hidden" id="kecamatan" name="kecamatan" x-ref="hiddenSelect" required >
                    </div>                    
                </div>

                <div class="lg:col-span-2 xs:col-span-3">
                    <label for="desa_kelurahan" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Desa / Kelurahan <span class="text-gray-400">*</span></label>            
                    <div 
                        x-data="{
                            selectOpen: false,
                            selectedItem: null,
                            selectableItems: [],
                            setItem(item) {
                                this.selectedItem = item;
                                this.selectOpen = false;
                                this.$refs.hiddenSelect.value = item.value;
                                this.$refs.hiddenSelect.dispatchEvent(new Event('change'));
                            },
                            updateItems(data) {
                                this.selectableItems = data.map(i => ({ title: i.name, value: i.code }));
                            }
                        }"
                        x-init="
                            const desaInput = $refs.hiddenSelect;
                            const kecamatanInput = document.getElementById('kecamatan');
                            kecamatanInput.addEventListener('change', async (e) => {
                                desaInput.value = '';
                                selectedItem = null;
                                selectableItems = [];
                                const response = await fetch(`/get-desa?kecamatan_id=${e.target.value}`);
                                const data = await response.json();
                                updateItems(data);
                            });
                        "
                        class="relative w-full"
                    >                        

                        <button type="button"
                            @click="selectOpen = !selectOpen"
                            class="relative flex justify-between bg-gray-50 border border-gray-300 font-display text-xs rounded-lg w-full p-2.5 focus:outline focus:outline-apple-600 focus:ring focus:ring-apple-600 focus:border-apple-400"
                        >
                            <span x-text="selectedItem ? selectedItem.title : '-- Pilih Desa/Kelurahan --'" class="truncate"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute right-2 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul x-show="selectOpen" x-transition class="absolute w-full py-1 mt-1 bg-white rounded-md shadow-md max-h-56 overflow-auto border border-gray-200 z-10" x-cloak>
                            <template x-for="item in selectableItems" :key="item.value">
                                <li @click="setItem(item)" class="py-2 pl-8 pr-2 text-xs text-gray-700 cursor-pointer hover:bg-gray-50 relative">
                                    <svg x-show="selectedItem && selectedItem.value === item.value" class="absolute left-2 w-3.5 h-3.5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="font-display font-medium text-xs" x-text="item.title"></span>
                                </li>
                            </template>
                        </ul>

                        <input type="hidden" id="desa_kelurahan" name="desa_kelurahan" x-ref="hiddenSelect" required >
                    </div>                                        
                </div>

                <div class="lg:col-span-2 xs:col-span-3">
                    <label for="jalan" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Jalan / No <span class="text-gray-400">*</span></label>            
                    <input name="jalan" id="jalan" type="text" pattern="[A-Za-z0-9\s.,]+" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s.,]/g, '').toUpperCase()" class=" bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="Jl. Kemerdekaan No. 1" required autocomplete="off"/>
                </div>  
                
                <div class="lg:col-span-2 xs:col-span-3">
                    <label for="telepon_instansi" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Telepon Instansi <span class="text-gray-400">*</span></label>            
                    <input name="telepon_instansi" id="telepon_instansi" type="text" pattern="[0-9]{15}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="10" maxlength="15" class="decoration-none bg-gray-50 border border-gray-300 font-display text-xs rounded-lg placeholder:text-gray-400 placeholder:text-xs focus:ring-apple-600 focus:border-apple-400 block w-full p-2.5 " placeholder="xxxx-xxxx-xxxx" required autocomplete="off"/>
                </div>
                    
            </div>
            
            {{-- data periode magang --}}
            <div class=" pb-12 grid lg:grid-cols-6 xs:grid-cols-1 gap-6 mt-10">
                <div class="col-span-full">
                    <h2 class="text-gray-800 text-left w-full font-bold font-display">Periode Magang</h2>
                    <p class="text-gray-400 text-xs text-left w-full font-display">Form dengan tanda ( <span class="text-gray-400">*</span> ) wajib diisi</p>
                </div>                

                <div class="col-span-2" 
                    x-data="{
                        datePickerOpen: false,
                        datePickerValue: '',
                        datePickerFormat: 'YYYY-MM-DD',
                        datePickerMonth: '',
                        datePickerYear: '',
                        datePickerDay: '',
                        datePickerDaysInMonth: [],
                        datePickerBlankDaysInMonth: [],
                        datePickerMonthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
                        datePickerDays: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],

                        // view: date / year
                        datePickerView: 'date',

                        // year picker
                        yearPickerStart: 0,

                        openYearPicker() {
                            this.datePickerView = 'year';
                            this.yearPickerStart = Math.floor(this.datePickerYear / 12) * 12;
                        },
                        selectYear(year) {
                            this.datePickerYear = year;
                            this.datePickerCalculateDays();
                            this.datePickerView = 'date';
                        },
                        prevYearRange() {
                            this.yearPickerStart -= 12;
                        },
                        nextYearRange() {
                            this.yearPickerStart += 12;
                        },

                        // day click
                        datePickerDayClicked(day) {
                            let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
                            this.datePickerDay = day;
                            this.datePickerValue = this.datePickerFormatDate(selectedDate);
                            this.datePickerOpen = false;
                        },

                        // month nav
                        datePickerPreviousMonth(){
                            if (this.datePickerMonth == 0) {
                                this.datePickerYear--;
                                this.datePickerMonth = 11;
                            } else {
                                this.datePickerMonth--;
                            }
                            this.datePickerCalculateDays();
                        },
                        datePickerNextMonth(){
                            if (this.datePickerMonth == 11) {
                                this.datePickerMonth = 0;
                                this.datePickerYear++;
                            } else {
                                this.datePickerMonth++;
                            }
                            this.datePickerCalculateDays();
                        },

                        datePickerIsSelectedDate(day) {
                            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
                            return this.datePickerValue === this.datePickerFormatDate(d);
                        },
                        datePickerIsToday(day) {
                            const today = new Date();
                            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
                            return today.toDateString() === d.toDateString();
                        },

                        datePickerCalculateDays() {
                            let daysInMonth = new Date(this.datePickerYear, this.datePickerMonth + 1, 0).getDate();
                            let dayOfWeek = new Date(this.datePickerYear, this.datePickerMonth).getDay();
                            this.datePickerBlankDaysInMonth = Array.from({length: dayOfWeek}, (_, i) => i + 1);
                            this.datePickerDaysInMonth = Array.from({length: daysInMonth}, (_, i) => i + 1);
                        },
                        datePickerFormatDate(date) {
                            let dd = ('0' + date.getDate()).slice(-2);
                            let mm = ('0' + (date.getMonth() + 1)).slice(-2);
                            let yyyy = date.getFullYear();
                            return `${yyyy}-${mm}-${dd}`;
                        },
                    }"
                    x-init="
                        let currentDate = new Date();
                        datePickerMonth = currentDate.getMonth();
                        datePickerYear = currentDate.getFullYear();
                        datePickerValue = datePickerFormatDate(currentDate);
                        datePickerCalculateDays();
                    " x-cloak>

                    <label for="tanggal_mulai" class="block mb-2 text-xs font-display text-apple-600 font-semibold">
                        Tanggal Mulai <span class="text-gray-400">*</span>
                    </label>

                    <div class="relative w-full">
                        <input x-ref="datePickerInput" type="text" @click="datePickerOpen = !datePickerOpen" 
                            x-model="datePickerValue" readonly
                            class="flex p-2.5 w-full text-xs bg-white rounded-lg border text-neutral-600 border-neutral-300 placeholder:text-neutral-400 focus:ring-apple-600 focus:border-apple-400"
                            placeholder="Pilih tanggal" />

                        <input type="hidden" name="tanggal_mulai" x-model="datePickerValue" />

                        <div 
                            @click="datePickerOpen = !datePickerOpen; $refs.datePickerInput.focus()" 
                            class="absolute top-0 right-0 h-full flex items-center pr-3 text-neutral-400 cursor-pointer hover:text-apple-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <div x-show="datePickerOpen" x-transition @click.away="datePickerOpen = false; datePickerView = 'date';" 
                            class="absolute z-20 top-12 left-0 p-4 bg-white border border-gray-200 rounded-lg shadow-lg w-full">


                            <!-- 🔵 CHANGE START — HEADER DATE MODE ONLY -->
                            <div class="flex justify-between items-center mb-2" 
                                x-show="datePickerView === 'date'">

                                <div>
                                    <span x-text="datePickerMonthNames[datePickerMonth]" 
                                        class="font-display font-extrabold text-gray-800"></span>

                                    <span 
                                        x-text="datePickerYear" 
                                        class="ml-1 font-display text-sm text-gray-600 cursor-pointer hover:text-apple-600"
                                        @click.stop="openYearPicker()"></span>
                                </div>

                                <div>
                                    <button @click="datePickerPreviousMonth()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                    </button>
                                    <button @click="datePickerNextMonth()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- 🔵 CHANGE END -->


                            <!-- DATE VIEW -->
                            <div x-show="datePickerView === 'date'">
                                <div class="grid grid-cols-7 text-center text-[10px] font-display font-semibold text-gray-500 mb-1">
                                    <template x-for="(day, index) in datePickerDays" :key="index">
                                        <div x-text="day"></div>
                                    </template>
                                </div>

                                <div class="grid grid-cols-7 text-xs">
                                    <template x-for="blankDay in datePickerBlankDaysInMonth">
                                        <div class="p-1"></div>
                                    </template>
                                    <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                                        <div class="p-1">
                                            <div 
                                                x-text="day"
                                                @click="datePickerDayClicked(day)" 
                                                :class="{
                                                    'bg-apple-600 text-white': datePickerIsSelectedDate(day),
                                                    'hover:bg-gray-100 text-gray-600': !datePickerIsSelectedDate(day)
                                                }"
                                                class="cursor-pointer font-display rounded-full w-6 h-6 flex items-center justify-center mx-auto">
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>


                            <!-- 🔵 CHANGE START — YEAR PICKER ONLY VIEW -->
                            <div x-show="datePickerView === 'year'" class="pt-2">

                                <div class="flex justify-between items-center mb-2">

                                    <button @click="prevYearRange()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                    </button>

                                    <span class="font-semibold font-display text-gray-700">
                                        <span x-text="yearPickerStart"></span> - <span x-text="yearPickerStart + 11"></span>
                                    </span>

                                    <button @click="nextYearRange()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>

                                </div>

                                <div class="grid grid-cols-3 gap-2 text-sm">
                                    <template x-for="i in 12" :key="i">
                                        <div class="cursor-pointer px-2 py-1 rounded hover:bg-gray-100 text-center"
                                            @click="selectYear(yearPickerStart + i - 1)">
                                            <span class="font-display text-gray-500" x-text="yearPickerStart + i - 1"></span>
                                        </div>
                                    </template>
                                </div>

                            </div>
                            <!-- 🔵 CHANGE END -->

                        </div>
                    </div>
                </div>

                <div class="col-span-2" 
                    x-data="{
                        datePickerOpen: false,
                        datePickerValue: '',
                        datePickerFormat: 'YYYY-MM-DD',
                        datePickerMonth: '',
                        datePickerYear: '',
                        datePickerDay: '',
                        datePickerDaysInMonth: [],
                        datePickerBlankDaysInMonth: [],
                        datePickerMonthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
                        datePickerDays: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],

                        // view: date / year
                        datePickerView: 'date',

                        // year picker
                        yearPickerStart: 0,

                        openYearPicker() {
                            this.datePickerView = 'year';
                            this.yearPickerStart = Math.floor(this.datePickerYear / 12) * 12;
                        },
                        selectYear(year) {
                            this.datePickerYear = year;
                            this.datePickerCalculateDays();
                            this.datePickerView = 'date';
                        },
                        prevYearRange() {
                            this.yearPickerStart -= 12;
                        },
                        nextYearRange() {
                            this.yearPickerStart += 12;
                        },

                        // day click
                        datePickerDayClicked(day) {
                            let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
                            this.datePickerDay = day;
                            this.datePickerValue = this.datePickerFormatDate(selectedDate);
                            this.datePickerOpen = false;
                        },

                        // month nav
                        datePickerPreviousMonth(){
                            if (this.datePickerMonth == 0) {
                                this.datePickerYear--;
                                this.datePickerMonth = 11;
                            } else {
                                this.datePickerMonth--;
                            }
                            this.datePickerCalculateDays();
                        },
                        datePickerNextMonth(){
                            if (this.datePickerMonth == 11) {
                                this.datePickerMonth = 0;
                                this.datePickerYear++;
                            } else {
                                this.datePickerMonth++;
                            }
                            this.datePickerCalculateDays();
                        },

                        datePickerIsSelectedDate(day) {
                            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
                            return this.datePickerValue === this.datePickerFormatDate(d);
                        },
                        datePickerIsToday(day) {
                            const today = new Date();
                            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
                            return today.toDateString() === d.toDateString();
                        },

                        datePickerCalculateDays() {
                            let daysInMonth = new Date(this.datePickerYear, this.datePickerMonth + 1, 0).getDate();
                            let dayOfWeek = new Date(this.datePickerYear, this.datePickerMonth).getDay();
                            this.datePickerBlankDaysInMonth = Array.from({length: dayOfWeek}, (_, i) => i + 1);
                            this.datePickerDaysInMonth = Array.from({length: daysInMonth}, (_, i) => i + 1);
                        },
                        datePickerFormatDate(date) {
                            let dd = ('0' + date.getDate()).slice(-2);
                            let mm = ('0' + (date.getMonth() + 1)).slice(-2);
                            let yyyy = date.getFullYear();
                            return `${yyyy}-${mm}-${dd}`;
                        },
                    }"
                    x-init="
                        let currentDate = new Date();
                        datePickerMonth = currentDate.getMonth();
                        datePickerYear = currentDate.getFullYear();
                        datePickerValue = datePickerFormatDate(currentDate);
                        datePickerCalculateDays();
                    " x-cloak>

                    <label for="tanggal_selesai" class="block mb-2 text-xs font-display text-apple-600 font-semibold">
                        Tanggal Selesai <span class="text-gray-400">*</span>
                    </label>

                    <div class="relative w-full">
                        <input x-ref="datePickerInput" type="text" @click="datePickerOpen = !datePickerOpen" 
                            x-model="datePickerValue" readonly
                            class="flex p-2.5 w-full text-xs bg-white rounded-lg border text-neutral-600 border-neutral-300 placeholder:text-neutral-400 focus:ring-apple-600 focus:border-apple-400"
                            placeholder="Pilih tanggal" />

                        <input type="hidden" name="tanggal_selesai" x-model="datePickerValue" />

                        <div 
                            @click="datePickerOpen = !datePickerOpen; $refs.datePickerInput.focus()" 
                            class="absolute top-0 right-0 h-full flex items-center pr-3 text-neutral-400 cursor-pointer hover:text-apple-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <div x-show="datePickerOpen" x-transition @click.away="datePickerOpen = false; datePickerView = 'date';" 
                            class="absolute z-20 top-12 left-0 p-4 bg-white border border-gray-200 rounded-lg shadow-lg w-full">


                            <!-- 🔵 CHANGE START — HEADER DATE MODE ONLY -->
                            <div class="flex justify-between items-center mb-2" 
                                x-show="datePickerView === 'date'">

                                <div>
                                    <span x-text="datePickerMonthNames[datePickerMonth]" 
                                        class="font-display font-extrabold text-gray-800"></span>

                                    <span 
                                        x-text="datePickerYear" 
                                        class="ml-1 font-display text-sm text-gray-600 cursor-pointer hover:text-apple-600"
                                        @click.stop="openYearPicker()"></span>
                                </div>

                                <div>
                                    <button @click="datePickerPreviousMonth()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                    </button>
                                    <button @click="datePickerNextMonth()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- 🔵 CHANGE END -->


                            <!-- DATE VIEW -->
                            <div x-show="datePickerView === 'date'">
                                <div class="grid grid-cols-7 text-center text-[10px] font-display font-semibold text-gray-500 mb-1">
                                    <template x-for="(day, index) in datePickerDays" :key="index">
                                        <div x-text="day"></div>
                                    </template>
                                </div>

                                <div class="grid grid-cols-7 text-xs">
                                    <template x-for="blankDay in datePickerBlankDaysInMonth">
                                        <div class="p-1"></div>
                                    </template>
                                    <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                                        <div class="p-1">
                                            <div 
                                                x-text="day"
                                                @click="datePickerDayClicked(day)" 
                                                :class="{
                                                    'bg-apple-600 text-white': datePickerIsSelectedDate(day),
                                                    'hover:bg-gray-100 text-gray-600': !datePickerIsSelectedDate(day)
                                                }"
                                                class="cursor-pointer font-display rounded-full w-6 h-6 flex items-center justify-center mx-auto">
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>


                            <!-- 🔵 CHANGE START — YEAR PICKER ONLY VIEW -->
                            <div x-show="datePickerView === 'year'" class="pt-2">

                                <div class="flex justify-between items-center mb-2">

                                    <button @click="prevYearRange()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                    </button>

                                    <span class="font-semibold font-display text-gray-700">
                                        <span x-text="yearPickerStart"></span> - <span x-text="yearPickerStart + 11"></span>
                                    </span>

                                    <button @click="nextYearRange()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>

                                </div>

                                <div class="grid grid-cols-3 gap-2 text-sm">
                                    <template x-for="i in 12" :key="i">
                                        <div class="cursor-pointer px-2 py-1 rounded hover:bg-gray-100 text-center"
                                            @click="selectYear(yearPickerStart + i - 1)">
                                            <span class="font-display text-gray-500" x-text="yearPickerStart + i - 1"></span>
                                        </div>
                                    </template>
                                </div>

                            </div>
                            <!-- 🔵 CHANGE END -->

                        </div>
                    </div>
                </div>                

                <div class="col-span-2">
                    <label for="dospem_id" class="block mb-2 text-xs font-display text-apple-600 font-semibold">Dosen Pembimbing <span class="text-gray-400">*</span></label>            
                    <div 
                        x-data="{
                            selectOpen: false,
                            selectedItem: null,
                            selectableItems: {{ \App\Models\Dospem::select('id', 'nama_dosen')->get()->map(fn($d) => [
                                'title' => $d->nama_dosen, 
                                'value' => $d->id
                            ]) }},
                            setItem(item) {
                                this.selectedItem = item;
                                this.selectOpen = false;
                                this.$refs.hiddenSelect.value = item.value;
                                this.$refs.hiddenSelect.dispatchEvent(new Event('change'));
                            }
                        }"
                        class="relative w-full"
                    >                        
                        
                        <button 
                            type="button"
                            @click="selectOpen = !selectOpen"
                            class="relative flex justify-between bg-gray-50 border border-gray-300 font-display text-xs rounded-lg w-full p-2.5 focus:outline focus:outline-apple-600 focus:ring focus:ring-apple-600 focus:border-apple-400"
                        >
                            <span x-text="selectedItem ? selectedItem.title : '-- Pilih Dosen Pembimbing --'" class="truncate"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute right-2 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul 
                            x-show="selectOpen"
                            x-transition
                            class="absolute w-full py-1 mt-1 bg-white rounded-md shadow-md max-h-56 overflow-auto border border-gray-200 z-10"
                            x-cloak
                        >
                            <template x-for="item in selectableItems" :key="item.value">
                                <li 
                                    @click="setItem(item)"
                                    class="py-2 pl-8 pr-2 text-xs text-gray-700 cursor-pointer hover:bg-gray-50 relative"
                                >
                                    <svg 
                                        x-show="selectedItem && selectedItem.value === item.value" 
                                        class="absolute left-2 w-3.5 h-3.5 text-green-500" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="2" 
                                        stroke-linecap="round" 
                                        stroke-linejoin="round"
                                    >
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="font-display font-medium text-xs" x-text="item.title"></span>
                                </li>
                            </template>
                        </ul>

                        <input type="hidden" id="dospem_id" name="dospem_id" x-ref="hiddenSelect" required >
                    </div>                                                                        
                </div>
            </div>

            {{-- Button --}}
            <div class="lg:col-span-full xs:col-span-3 w-full">
                <button 
                    type="submit"
                    :disabled="loading"
                    class="flex gap-2 justify-center items-center text-white text-center w-full cursor-pointer font-display font-bold bg-apple-600 hover:bg-apple-600/90 transition duration-300 ease-in-out px-4 py-2 text-sm rounded-lg inset-ring inset-ring-apple-700/20 outline -outline-offset-2 outline-apple-500/30 shadow-md shadow-apple-700/40 inset-shadow-[0_-3px_4px] inset-shadow-apple-700/80 disabled:opacity-70 disabled:cursor-not-allowed"
                >
                    <template x-if="!loading">
                        <span>Ajukan</span>
                    </template>
                    <template x-if="loading">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 border-2 border-white border-t-white/20 rounded-full animate-spin"></div>
                            <span>Mengirim...</span>
                        </div>
                    </template>
                </button>
            </div>

        </form> 

    </section>
    <x-footer></x-footer>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script>

    // script fetch data wilayah
    document.addEventListener('DOMContentLoaded', function () {
        const provinsi = document.getElementById('provinsi');
        const kabupaten = document.getElementById('kabupaten_kota');
        const kecamatan = document.getElementById('kecamatan');
        const desa = document.getElementById('desa_kelurahan');

        provinsi.addEventListener('change', function () {
            fetch(`/get-kabupaten?provinsi_id=${this.value}`)
                .then(response => response.json())
                .then(data => {
                    kabupaten.innerHTML = '<option value="">-- Pilih Kabupaten/Kota --</option>';
                    kecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
                    desa.innerHTML = '<option value="">-- Pilih Desa/Kelurahan --</option>';
                    data.forEach(item => {
                        kabupaten.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                    });
                });
        });

        kabupaten.addEventListener('change', function () {
            fetch(`/get-kecamatan?kabupaten_id=${this.value}`)
                .then(response => response.json())
                .then(data => {
                    kecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
                    desa.innerHTML = '<option value="">-- Pilih Desa/Kelurahan --</option>';
                    data.forEach(item => {
                        kecamatan.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                    });
                });
        });

        kecamatan.addEventListener('change', function () {
            fetch(`/get-desa?kecamatan_id=${this.value}`)
                .then(response => response.json())
                .then(data => {
                    desa.innerHTML = '<option value="">-- Pilih Desa/Kelurahan --</option>';
                    data.forEach(item => {
                        desa.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                    });
                });
        });
    });            
    
    // script validasi form submission
    document.addEventListener('alpine:init', () => {
        Alpine.data('formHandler', () => ({
            loading: false,

            async validateAndSubmit(e) {
                this.loading = true;
                let valid = true;
                let firstErrorElement = null;

                // === 1️⃣ Validasi SELECT (input hidden dari Pines UI)
                const requiredHiddenInputs = document.querySelectorAll('input[required][type="hidden"]');

                requiredHiddenInputs.forEach(input => {
                    const wrapper = input.closest('div.relative');
                    const selectButton = wrapper?.querySelector('button');

                    if (!input.value) {
                        valid = false;
                        if (!firstErrorElement && wrapper) firstErrorElement = wrapper;

                        // Tambahkan efek fokus/error
                        if (selectButton) {
                            selectButton.classList.add('ring-1', 'ring-red-400');
                        }
                    } else if (selectButton) {
                        selectButton.classList.remove('ring-1', 'ring-red-400');
                    }
                });

                // === 2️⃣ Validasi INPUT TEXT (nama, nim, email, instansi_tujuan, jalan)
                const textFields = ['nama_mahasiswa', 'nim', 'email', 'telepon','tempat_lahir','judul_laporan', 'alamat', 'instansi_tujuan', 'jalan', 'telepon_instansi'];
                textFields.forEach(name => {
                    const input = document.querySelector(`input[name="${name}"]`);
                    if (input) {
                        if (!input.value.trim()) {
                            valid = false;
                            if (!firstErrorElement) firstErrorElement = input;
                            input.classList.add('ring-1', 'ring-red-400');
                        } else {
                            input.classList.remove('ring-1', 'ring-red-400');
                        }
                    }
                });

                // === 3️⃣ Validasi DATEPICKER
                const dateMulaiInput = document.querySelector('input[name="tanggal_mulai"]');
                const dateSelesaiInput = document.querySelector('input[name="tanggal_selesai"]');
                const dateLahirInput = document.querySelector('input[name="tanggal_lahir"]');

                // Hapus pesan error lama (jika ada)
                document.querySelectorAll('.date-error-msg').forEach(el => el.remove());

                // Ambil wrapper & elemen utama untuk highlight
                const dateMulaiWrapper = dateMulaiInput?.closest('div.relative');
                const dateSelesaiWrapper = dateSelesaiInput?.closest('div.relative');
                const dateLahirWrapper = dateLahirInput?.closest('div.relative');
                const dateMulaiButton = dateMulaiWrapper?.querySelector('input[type="text"]');
                const dateSelesaiButton = dateSelesaiWrapper?.querySelector('input[type="text"]');
                const dateLahirButton = dateLahirWrapper?.querySelector('input[type="text"]');

                // Cek wajib isi
                if (!dateMulaiInput?.value) {
                    valid = false;
                    if (!firstErrorElement && dateMulaiWrapper) firstErrorElement = dateMulaiWrapper;
                    dateMulaiButton?.classList.add('ring-1', 'ring-red-400');
                } else {
                    dateMulaiButton?.classList.remove('ring-1', 'ring-red-400');
                }

                if (!dateSelesaiInput?.value) {
                    valid = false;
                    if (!firstErrorElement && dateSelesaiWrapper) firstErrorElement = dateSelesaiWrapper;
                    dateSelesaiButton?.classList.add('ring-1', 'ring-red-400');
                } else {
                    dateSelesaiButton?.classList.remove('ring-1', 'ring-red-400');
                }

                if (!dateLahirInput?.value) {
                    valid = false;
                    if (!firstErrorElement && dateLahirWrapper) firstErrorElement = dateLahirWrapper;
                    dateLahirButton?.classList.add('ring-1', 'ring-red-400');
                } else {
                    dateLahirButton?.classList.remove('ring-1', 'ring-red-400');
                }

                // === 3️⃣ Validasi durasi minimal 30 hari
                if (dateMulaiInput?.value && dateSelesaiInput?.value) {
                    const startDate = new Date(dateMulaiInput.value);
                    const endDate = new Date(dateSelesaiInput.value);
                    const diffDays = (endDate - startDate) / (1000 * 60 * 60 * 24);

                    if (diffDays < 30) {
                        valid = false;
                        if (!firstErrorElement && dateSelesaiWrapper) firstErrorElement = dateSelesaiWrapper;

                        dateSelesaiButton?.classList.add('ring-1', 'ring-red-400');

                        // Tambahkan pesan error khusus durasi
                        const msg = document.createElement('p');
                        msg.className = 'text-red-400/80 font-medium pl-1 font-display text-[11px] mt-1 date-error-msg';
                        msg.textContent = 'Durasi magang diwajibkan lebih dari 30 hari.';
                        dateSelesaiWrapper.parentElement.appendChild(msg);
                    }
                }

                // === Validasi Tanggal lahir minimal 18 tahun
                if (dateLahirInput?.value) {
                    const today = new Date();
                    const birthDate = new Date(dateLahirInput.value);                    
                    let age = today.getFullYear() - birthDate.getFullYear();
                    const m = today.getMonth() - birthDate.getMonth();

                    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }

                    if (age < 18) {
                        valid = false;
                        if (!firstErrorElement && dateLahirWrapper) firstErrorElement = dateLahirWrapper;
                        dateLahirButton?.classList.add('ring-1', 'ring-red-400');

                        // Tambahkan pesan error khusus durasi
                        const msg = document.createElement('p');
                        msg.className = 'text-red-400/80 font-medium pl-1 font-display text-[11px] mt-1 date-error-msg';
                        msg.textContent = 'Umur minimal 18 tahun.';
                        dateLahirWrapper.parentElement.appendChild(msg);
                    }
                }

                // === 4️⃣ Jika ada field yang tidak valid → hentikan submit
                if (!valid) {
                    this.loading = false;
                    e.preventDefault();

                    if (firstErrorElement) {
                        firstErrorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstErrorElement.classList.add('animate-shake');
                        setTimeout(() => firstErrorElement.classList.remove('animate-shake'), 500);
                    }
                    return;
                }

                // === 5️⃣ Submit form jika semua valid
                e.target.submit();
            },
        }));
    });

</script>
@endsection