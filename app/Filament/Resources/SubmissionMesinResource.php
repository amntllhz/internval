<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Submission;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use App\Models\SubmissionMesin;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubmissionMesinResource\Pages;
use App\Filament\Resources\SubmissionMesinResource\RelationManagers;
use Filament\Forms\Components\Tabs\Tab;

class SubmissionMesinResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Data Pengajuan';
    protected static ?string $navigationLabel = 'S1 Teknik Mesin';
    protected static ?string $pluralModelLabel = 'S1 Teknik Mesin';
    protected static ?string $slug = 'submission-mesin';    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Data Mahasiswa')                                   
                ->schema([
                    TextInput::make('nama_mahasiswa')
                        ->disabled()                        
                        ->label('Nama Mahasiswa'),
                    TextInput::make('nim')
                        ->disabled()
                        ->label('Nomor Induk Mahasiswa'),
                    TextInput::make('prodi')
                        ->disabled()
                        ->label('Progam Studi'),
                    TextInput::make('jenis_kelamin')
                        ->disabled()
                        ->label('Jenis Kelamin'),
                    TextInput::make('telepon')
                        ->disabled()
                        ->label('Nomor Telepon'),
                    TextInput::make('email')
                        ->disabled()
                        ->label('E-mail'),    
                ])->columns(2),
                //
                
                Section::make('Data Instansi / Perusahaan / Lembaga')                
                ->schema([
                    TextInput::make('instansi_tujuan')
                        ->disabled()
                        ->label('Instansi Tujuan')
                        ->columnSpan(1),                
                    TextInput::make('provinsi')
                        ->label('Provinsi')
                        ->disabled(),
                    TextInput::make('kabupaten_kota')
                        ->label('Kabupaten / Kota')
                        ->disabled(),
                    TextInput::make('kecamatan')
                        ->label('Kecamatan')
                        ->disabled(),
                    TextInput::make('desa_kelurahan')
                        ->label('Desa / Kelurahan')
                        ->disabled(),
                    TextInput::make('jalan')
                        ->label('Jalan')
                        ->disabled(),                    
                ])->columns([
                    'default' => 1,
                    'xs' => 1,
                    'md' => 2,
                    'lg' => 3
                ]),

                Section::make('Periode Magang')                
                ->schema([                    
                    DatePicker::make('tanggal_mulai')
                        ->label('Tanggal Mulai')
                        ->disabled(),
                    DatePicker::make('tanggal_selesai')
                        ->label('Tanggal Selesai')
                        ->disabled(),
                    TextInput::make('dospem_id')
                        ->label('Dosen Pembimbing')
                        ->formatStateUsing(fn ($state, $record) => $record?->dospem?->nama_dosen ?? '-')
                        ->disabled(),
                ])->columns([
                    'default' => 1,
                    'xs' => 1,
                    'md' => 2,
                    'lg' => 3
                ]),

                Section::make('Verifikasi Pengajuan')
                ->schema([                                        

                    // BAAK hanya bisa melihat dan ubah status surat
                    Select::make('status_surat')
                        ->options([
                            'none' => 'Belum dibuat',
                            'made' => 'Sedang dibuat',
                            'ready' => 'Siap diambil',
                        ])
                        ->extraAttributes([
                            'class' => 'cursor-pointer'
                        ])
                        ->native(false)
                        ->required()                                        
                ]),
                                
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_mahasiswa')
                    ->label('Nama Mahasiswa'),
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM'),
                Tables\Columns\TextColumn::make('instansi_tujuan')
                    ->label('Instansi Tujuan'),
                Tables\Columns\TextColumn::make('status_pengajuan')
                    ->label('Status Pengajuan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'accepted' => 'success',
                        'rejected' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('status_surat')
                    ->label('Status Surat')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'none' => 'gray',
                        'made' => 'warning',
                        'ready' => 'success',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->hidden(fn (Submission $record): bool => $record->status_pengajuan == 'accepted'),
                Tables\Actions\EditAction::make()
                ->visible(fn (Submission $record): bool => $record->status_pengajuan == 'accepted'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->where('prodi', 'S1 Teknik Mesin');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubmissionMesins::route('/'),
            'create' => Pages\CreateSubmissionMesin::route('/create'),
            'edit' => Pages\EditSubmissionMesin::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return $record->status_pengajuan === 'accepted';
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['baak']);
    }
}
