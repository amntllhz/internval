<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Prodi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Dospemdraft;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DospemdraftResource\Pages;
use App\Filament\Resources\DospemdraftResource\RelationManagers;
use App\Models\Dospem;
use Filament\Tables\Filters\SelectFilter;

class DospemdraftResource extends Resource
{
    protected static ?string $model = Dospemdraft::class;

    protected static ?string $navigationGroup = 'Data Internal';
    protected static ?string $navigationLabel = 'Draft Bimbingan';
    protected static ?string $pluralModelLabel = 'Draft Bimbingan';
    protected static ?string $slug = 'draft-bimbingan';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //                
                TextInput::make('nim')
                    ->label('Nomor Induk Mahasiswa')
                    ->validationAttribute('Nomor Induk Mahasiswa')
                    ->unique(ignoreRecord: true)
                    ->rules([
                        'required',
                        'regex:/^[0-9\s]+$/',
                        'min:12',
                        'max:12',
                    ])
                    ->validationMessages([
                        'unique' => 'NIM sudah terdaftar',
                        'regex' => 'NIM hanya boleh mengandung huruf, spasi, dan koma',
                        'min' => 'NIM minimal 3 karakter',
                        'max' => 'NIM maksimal 255 karakter',
                        'required' => 'NIM wajib diisi',
                    ]),
                TextInput::make('nama_mahasiswa')
                    ->label('Nama Mahasiswa')
                    ->validationAttribute('Nama Mahasiswa')
                    ->rules([
                        'required',
                        'regex:/^[A-Za-z\s.,]+$/',
                        'min:3',
                        'max:255',
                    ])
                    ->validationMessages([
                        'regex' => 'Nama Mahasiswa hanya boleh mengandung huruf, spasi, dan koma',
                        'min' => 'Nama Mahasiswa minimal 3 karakter',
                        'max' => 'Nama Mahasiswa maksimal 255 karakter',
                        'required' => 'Nama Mahasiswa wajib diisi',
                    ]),
                Select::make('nama_dpl')
                    ->label('Nama Dosen')
                    ->validationAttribute('Nama Dosen')
                    ->required()
                    ->validationMessages([
                        'required' => 'Anda harus memilih DPL',
                    ])                    
                    ->searchable()
                    ->options(
                        Dospem::all()->pluck('nama_dosen','nama_dosen')
                    )->native(false)->required(),
                Select::make('prodi')
                    ->label('Program Studi')
                    ->validationAttribute('Program Studi')
                    ->rules([
                        'required',
                    ])
                    ->validationMessages([
                        'required' => 'Program Studi wajib diisi',
                    ])
                    ->options(
                        Prodi::all()->pluck('nama', 'nama')
                    )->native(false)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_dpl')
                    ->label('Nama Dosen')
                    ->limit(36),                       
                Tables\Columns\TextColumn::make('nama_mahasiswa')
                    ->label('Mahasiswa Bimbingan'),  
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),                         
                Tables\Columns\TextColumn::make('prodi')
                    ->label('Program Studi'),  
            ])
            ->emptyStateDescription('Data akan ditampilkan ketika ada pengajuan')
            ->emptyStateIcon('heroicon-o-bookmark-slash')
            ->searchPlaceholder('Cari NIM')
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
                SelectFilter::make('nama_dpl')
                    ->label('Dosen Pembimbing Lapangan')
                    ->searchable()
                    ->options(Dospem::all()->pluck('nama_dosen', 'nama_dosen')
                    )->native(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDospemdrafts::route('/'),
            'create' => Pages\CreateDospemdraft::route('/create'),
            'edit' => Pages\EditDospemdraft::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['kaprodi_informatika', 'kaprodi_mesin','kaprodi_manajemenit']);
    }
}
