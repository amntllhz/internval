<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmissionResource\Pages;
use App\Filament\Resources\SubmissionResource\RelationManagers;
use App\Models\Submission;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;

class SubmissionResource extends Resource
{
    protected static ?string $model = Submission::class;

    public static function getEloquentQuery(): Builder
    {
        $user = Filament::auth()->user();
        $query = parent::getEloquentQuery();

        if (str_starts_with($user->role, 'dosen')) {
            
            $roleToProdi = [
                
                'dosen_informatika' => 'S1 Informatika',
                'dosen_mesin' => 'S1 Teknik Mesin',
            ];
        }

        $prodi = $roleToProdi[$user->role] ?? null;

        if ($prodi) {
            $query->where('prodi', $prodi);
        }

        return $query;
    }


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {   
        $user = Filament::auth()->user();

        return $form
            ->schema([

                Section::make('Data Mahasiswa')            
                ->schema([
                    TextInput::make('nama_mahasiswa')->disabled(),
                    TextInput::make('nim')->disabled(),
                    TextInput::make('prodi')->disabled(),
                    TextInput::make('email')->disabled(),    
                ])->columns(2),
                //
                
                Section::make('Data Pengajuan')
                ->schema([
                    TextInput::make('instansi_tujuan')->disabled()->columnSpan(2),                
                    TextInput::make('provinsi')->disabled(),
                    TextInput::make('kabupaten_kota')->disabled(),
                    TextInput::make('kecamatan')->disabled(),
                    TextInput::make('desa_kelurahan')->disabled(),
                    TextInput::make('jalan')->disabled(),
                    DatePicker::make('tanggal_mulai')->disabled(),
                    DatePicker::make('tanggal_selesai')->disabled(),
                ])->columns(3),

                Section::make('Action')
                ->schema([
                    // dosen hanya bisa melihat dan ubah status pengajuan
                    Select::make('status_pengajuan')
                        ->options([
                            'pending' => 'Pending',
                            'accepted' => 'Accepted',
                            'rejected' => 'Rejected',
                        ])
                        ->required()                
                        ->visible(fn () => $user->role === 'dosen_informatika' || $user->role === 'dosen_mesin'),

                    Textarea::make('alasan_penolakan')
                        ->label('Alasan Penolakan')
                        ->rows(3)
                        ->visible(fn () => $user->role === 'dosen_informatika' || $user->role === 'dosen_mesin'),

                    // BAAK hanya bisa melihat dan ubah status surat
                    Select::make('status_surat')
                        ->options([
                            'none' => 'Belum dibuat',
                            'made' => 'Sudah dibuat',
                            'ready' => 'Siap diambil',
                        ])
                        ->required()                
                        ->visible(fn () => $user->role === 'baak')
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
                Tables\Columns\TextColumn::make('provinsi')
                    ->label('Provinsi'),
                Tables\Columns\TextColumn::make('kabupaten_kota')
                    ->label('Kabupaten/Kota'),
                Tables\Columns\TextColumn::make('kecamatan')
                    ->label('Kecamatan'),
                Tables\Columns\TextColumn::make('desa_kelurahan')
                    ->label('Desa/Kelurahan'),
                Tables\Columns\TextColumn::make('jalan')
                    ->label('Jalan'),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('status_pengajuan')
                    ->options([
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ]),

                Tables\Filters\SelectFilter::make('status_surat')
                    ->options([
                        'none' => 'Belum dibuat',
                        'made' => 'Sudah dibuat',
                        'ready' => 'Siap diambil',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmission::route('/create'),
            'edit' => Pages\EditSubmission::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
    

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['dosen_informatika', 'dosen_mesin', 'baak']);
    }
    
}
