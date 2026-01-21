<?php

namespace App\Filament\Resources\SubmissionExpiredResource\Pages;

use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Group;
use Filament\Resources\Pages\EditRecord;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Contracts\HasInfolists;
use App\Filament\Resources\SubmissionExpiredResource;
use Filament\Infolists\Concerns\InteractsWithInfolists;

class EditSubmissionExpired extends EditRecord implements HasInfolists
{   
    use InteractsWithInfolists;

    protected static string $resource = SubmissionExpiredResource::class;
    protected static ?string $title = 'Perbarui Pengajuan';
    protected static string $view = 'filament.resources.submission-expired-resource.pages.edit-submission-expired';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->icon('heroicon-s-trash')
                ->label('Hapus Data'),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            // Kita hanya mengembalikan tombol Batal yang diubah labelnya
            $this->getCancelFormAction()
                ->label('Kembali') // Mengganti label "Batal" menjadi "Kembali"
                ->color('gray'),   // Opsional: mengatur warna tombol
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist

            ->record($this->getRecord())
            ->schema([
                //

                Group::make([            
                    
                    Section::make('Data Mahasiswa')
                        ->description('Data yang diisi oleh mahasiswa')                        
                        ->icon('heroicon-o-identification')
                        ->iconColor('primary')
                        ->schema([
                            TextEntry::make('nama_mahasiswa')
                            ->color('gray')
                            ->label('Nama Mahasiswa'),
                            TextEntry::make('nim')
                            ->badge('primary')                            
                            ->label('Nomor Induk Mahasiswa'),
                            TextEntry::make('prodi')
                            ->color('gray')
                            ->label('Program Studi'),
                            TextEntry::make('jenis_kelamin')
                            ->color('gray')
                            ->label('Jenis Kelamin'),
                            TextEntry::make('telepon')
                            ->color('gray')
                            ->label('Nomor Telepon'),
                            TextEntry::make('email')
                            ->color('gray')
                            ->label('E-mail'),
                    ])->columnSpan(2)->columns(3), 
                            
                    Section::make('Instansi / Perusahaan / Lembaga')
                        ->iconColor('primary')
                        ->icon('heroicon-o-briefcase')
                        ->description('Data instansi / perusahaan / lembaga tujuan magang')
                        ->schema([
                            TextEntry::make('instansi_tujuan')
                            ->color('gray')
                            ->label('Instansi Tujuan'),                        
                            TextEntry::make('provinsi')
                            ->color('gray')
                            ->label('Provinsi'),
                            TextEntry::make('kabupaten_kota')
                            ->color('gray')
                            ->label('Kabupaten / Kota'), 
                            TextEntry::make('kecamatan')
                            ->color('gray')
                            ->label('Kecamatan'),
                            TextEntry::make('desa_kelurahan')
                            ->color('gray')
                            ->label('Desa / Kelurahan'),
                            TextEntry::make('jalan')
                            ->color('gray')
                            ->label('Jalan'),
                    ])->columnSpan(2)->columns([
                        'default' => 1,
                        'xs' => 1,
                        'md' => 3,
                    ]),                    
                    
                ])->columnSpan([
                    'default' => 3,
                    'md' => 2,
                ])->columns(1),

                Section::make('Periode PKL / Magang')
                    ->iconColor('primary')
                    ->icon('heroicon-o-calendar-days')
                    ->description('Waktu pelaksanaan yang diajukan')
                    ->schema([
                        TextEntry::make('judul_laporan')
                        ->color('gray')
                        ->label('Judul Laporan'),
                        TextEntry::make('tanggal_mulai')
                        ->badge('primary')
                        ->dateTime('d/m/Y')
                        ->label('Tanggal Mulai'),
                        TextEntry::make('tanggal_selesai')
                        ->badge('primary')
                        ->dateTime('d/m/Y')
                        ->label('Tanggal Selesai'),
                        TextEntry::make('tenggat_pengajuan')
                        ->badge('primary')
                        ->formatStateUsing(function ($state, $record) {
                            $sisa = $record->sisa_hari;

                            $label = match (true) {
                                $sisa > 1 => "{$sisa} hari tersisa",
                                $sisa === 1 => "Hari terakhir",
                                default => "Melewati batas waktu",
                            };

                            return $state->format('d/m/Y') . ' · ' . $label;
                        })
                        ->color(fn ($record) => match (true) {
                            $record->sisa_hari > 2 => 'primary',
                            $record->sisa_hari === 2 => 'warning',
                            default => 'danger',
                        })
                        ->label('Tenggat Verifikasi'),
                        TextEntry::make('dospem_req_id')
                        ->color('gray')
                        ->label('DPL Pilihan Mahasiswa')   
                        ->formatStateUsing(fn ($state, $record) => $record?->dospemRequest?->nama_dosen ?? '-'),
                    ])->columnSpan([
                        'default' => 3,
                        'md' => 1,
                    ])->columns(1),

                               

            ])->columns(3);
    }
}
