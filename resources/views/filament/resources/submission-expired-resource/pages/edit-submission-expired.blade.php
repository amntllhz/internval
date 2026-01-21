<x-filament-panels::page>
    
    {{-- BAGIAN 1: Menampilkan Infolist (Detail Data) --}}
    {{ $this->infolist }}    

    {{-- BAGIAN 2: Menampilkan Form Edit --}}     

        {{-- Ini adalah wrapper Form standar Filament --}}
        <x-filament-panels::form wire:submit="save"> 
            
            {{-- Render komponen Form --}}
            {{ $this->form }}
    
            {{-- Render Tombol Aksi (Save, Cancel) --}}
            <x-filament-panels::form.actions 
                :actions="$this->getCachedFormActions()" 
                :full-width="$this->hasFullWidthFormActions()" 
            />
        </x-filament-panels::form>
    

</x-filament-panels::page>