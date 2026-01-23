<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Prodi;
use Filament\Forms\Form;
use App\Models\Allowlist;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Symfony\Component\Console\Color;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ImportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Imports\AllowlistImporter;
use Filament\Actions\Imports\Models\Import;
use App\Filament\Resources\AllowlistResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AllowlistResource\RelationManagers;

class AllowlistResource extends Resource
{
    protected static ?string $model = Allowlist::class;

    protected static ?string $navigationGroup = 'Data Internal';
    protected static ?string $navigationLabel = 'Mahasiswa Aktif';
    protected static ?string $pluralModelLabel = 'Mahasiswa Aktif';
    protected static ?string $slug = 'mahasiswa-aktif';
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    

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
                        'min' => 'NIM minimal 12 karakter',
                        'max' => 'NIM maksimal 12 karakter',
                        'required' => 'NIM wajib diisi',
                    ]),                
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
                Toggle::make('is_active')
                        ->label('Ijinkan Mahasiswa Melakukan Pengajuan')
                        ->default(true)                    
                        ->inline(),  
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),                    
                Tables\Columns\TextColumn::make('prodi')
                    ->label('Program Studi'),  
                Tables\Columns\TextColumn::make('is_active')
                    ->label('Ijin Pengajuan')                         
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Aktif' : 'Tidak Aktif')
                    ->color(fn (bool $state): string => $state ? 'success' : 'danger')
                    ->icon(fn (bool $state): string => $state ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle'),
            ])
            ->emptyStateDescription('Data akan ditampilkan ketika anda menambahkan data')
            ->emptyStateIcon('heroicon-o-bookmark-slash')
            ->filters([
                //
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
            'index' => Pages\ListAllowlists::route('/'),
            'create' => Pages\CreateAllowlist::route('/create'),
            'edit' => Pages\EditAllowlist::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['baak']);
    }
}
