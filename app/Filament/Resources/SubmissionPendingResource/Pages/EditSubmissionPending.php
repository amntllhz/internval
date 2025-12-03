<?php

namespace App\Filament\Resources\SubmissionPendingResource\Pages;

use App\Filament\Resources\SubmissionPendingResource;
use Dom\Text;
use Filament\Actions;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\EditRecord;

class EditSubmissionPending extends EditRecord implements HasInfolists
{   
    use InteractsWithInfolists;

    protected static string $resource = SubmissionPendingResource::class;

    protected static string $view = 'filament.resources.submission-pending-resource.pages.edit-submission-pending';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
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

                Section::make('Periode Magang')
                    ->iconColor('primary')
                    ->icon('heroicon-o-calendar-days')
                    ->description('Periode magang yang diinginkan')
                    ->schema([
                        TextEntry::make('tanggal_mulai')

                        ->badge('primary')
                        ->dateTime('d/m/Y')
                        ->label('Tanggal Mulai'),
                        TextEntry::make('tanggal_selesai')
                        ->badge('primary')
                        ->dateTime('d/m/Y')
                        ->label('Tanggal Selesai'),
                        TextEntry::make('dospem_id')
                        ->color('gray')
                        ->label('Dosen Pembimbing')   
                        ->formatStateUsing(fn ($state, $record) => $record?->dospem?->nama_dosen ?? '-'),
                    ])->columnSpan([
                        'default' => 3,
                        'md' => 1,
                    ])->columns(1),

                               

            ])->columns(3);
    }
}
