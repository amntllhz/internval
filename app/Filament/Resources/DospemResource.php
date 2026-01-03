<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Dospem;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DospemResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DospemResource\RelationManagers;
use App\Filament\Resources\DospemResource\RelationManagers\SubmissionsRelationManager;
use App\Models\Prodi;

class DospemResource extends Resource
{
    protected static ?string $model = Dospem::class;

    protected static ?string $navigationGroup = 'Data Internal';
    protected static ?string $navigationLabel = 'Dosen Pembimbing';
    protected static ?string $pluralModelLabel = 'Dosen Pembimbing';
    protected static ?string $slug = 'dosen-pembimbing';
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nama_dosen')
                    ->label('Nama Dosen')
                    ->validationAttribute('Nama Dosen')
                    ->rules([
                        'required',
                        'regex:/^[A-Za-z\s.,]+$/',
                        'min:3',
                        'max:255',
                    ])
                    ->validationMessages([
                        'regex' => 'Nama Dosen hanya boleh mengandung huruf, spasi, dan koma',
                        'min' => 'Nama Dosen minimal 3 karakter',
                        'max' => 'Nama Dosen maksimal 255 karakter',
                        'required' => 'Nama Dosen wajib diisi',
                    ]),
                TextInput::make('nidn')
                    ->label('NIDN')
                    ->validationAttribute('NIDN')
                    ->rules([
                        'required',
                        'regex:/^[0-9\s]+$/',
                        'min:10',
                        'max:15',
                    ])
                    ->validationMessages([
                        'regex' => 'NIDN hanya boleh mengandung angka dan spasi',
                        'min' => 'NIDN minimal 10 karakter',
                        'max' => 'NIDN maksimal 15 karakter',
                        'required' => 'NIDN wajib diisi', 
                    ]),
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->validationAttribute('E-mail')
                    ->rules([
                        'required',
                    ])             
                    ->validationMessages([
                        'required' => 'E-mail wajib diisi',
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_dosen')
                    ->label('Nama Dosen'),
                Tables\Columns\TextColumn::make('nidn')
                    ->label('NIDN'),
                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail'),
                Tables\Columns\TextColumn::make('prodi')
                    ->label('Program Studi'),
            ])
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
            SubmissionsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDospems::route('/'),
            'create' => Pages\CreateDospem::route('/create'),
            'edit' => Pages\EditDospem::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['baak','kaprodi_informatika', 'kaprodi_mesin','kaprodi_manajemenit']);
    }
}
