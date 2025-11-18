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
                    ->required(),
                TextInput::make('nidn')
                    ->label('NIDN')
                    ->required(),
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required(),
                Select::make('prodi')
                    ->label('Program Studi')
                    ->options([
                        'S1 Informatika' => 'S1 Informatika',
                        'S1 Teknik Mesin' => 'S1 Teknik Mesin',
                ])->native(false)->required(),
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
        return in_array($user->role, ['baak']);
    }
}
