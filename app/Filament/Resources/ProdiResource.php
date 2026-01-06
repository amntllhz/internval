<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Prodi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdiResource\RelationManagers;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\CreateAction;
use SebastianBergmann\CodeCoverage\Test\TestSize\Large;

class ProdiResource extends Resource
{
    protected static ?string $model = Prodi::class;

    protected static ?string $navigationGroup = 'Data Internal';
    protected static ?string $navigationLabel = 'Program Studi';
    protected static ?string $pluralModelLabel = 'Program Studi';
    protected static ?string $slug = 'program-studi';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nama')                    
                    ->label('Nama Program Studi')                    
                    ->validationAttribute('Nama Program Studi')  
                    ->unique(ignoreRecord: true)                                 
                    ->rules([
                        'required',
                        'regex:/^[A-Za-z1-5\s.,]+$/',
                        'min:3',
                        'max:255',
                    ])
                    ->validationMessages([
                        'unique' => 'Program Studi sudah terdaftar',
                        'regex' => 'Nama Program Studi hanya boleh mengandung huruf, spasi, dan angka 1-5',
                        'min' => 'Nama Program Studi minimal 3 karakter',
                        'max' => 'Nama Program Studi maksimal 255 karakter',
                        'required' => 'Nama Program Studi wajib diisi',
                    ]),                    
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama')
                    ->label('Program Studi'),                

            ])
            ->emptyStateDescription('Data akan ditampilkan ketika anda menambahkan data')
            ->emptyStateIcon('heroicon-o-bookmark-slash')
            ->filters([
                //
            ])                        
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalHeading('Ubah Program Studi')
                    ->modalWidth(MaxWidth::Medium),                    
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
            'index' => Pages\ListProdis::route('/'),
            // 'create' => Pages\CreateProdi::route('/create'),
            // 'edit' => Pages\EditProdi::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['baak']);
    }
}
