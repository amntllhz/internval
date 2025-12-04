<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kaprodi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KaprodiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KaprodiResource\RelationManagers;

class KaprodiResource extends Resource
{
    protected static ?string $model = Kaprodi::class;

    protected static ?string $navigationGroup = 'Data Internal';
    protected static ?string $navigationLabel = 'Ketua Program Studi';
    protected static ?string $pluralModelLabel = 'Ketua Program Studi';
    protected static ?string $slug = 'ketua-program-studi';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nama_kaprodi')
                    ->label('Nama Dosen')
                    ->required(),
                TextInput::make('nidn')
                    ->label('NIDN')
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
                Tables\Columns\TextColumn::make('nama_kaprodi')
                    ->label('Nama Kaprodi'),
                Tables\Columns\TextColumn::make('nidn')
                    ->label('NIDN'),                
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
            'index' => Pages\ListKaprodis::route('/'),
            'create' => Pages\CreateKaprodi::route('/create'),
            'edit' => Pages\EditKaprodi::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['baak']);
    }
}
