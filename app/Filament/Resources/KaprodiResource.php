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
use App\Models\Prodi;
use Filament\Forms\Components\Section;

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
                    ->unique(ignoreRecord: true)
                    ->rules([
                        'required',
                        'regex:/^[0-9\s]+$/',
                        'min:10',
                        'max:15',
                    ])
                    ->validationMessages([
                        'unique' => 'NIDN sudah terdaftar',
                        'regex' => 'NIDN hanya boleh mengandung angka dan spasi',
                        'min' => 'NIDN minimal 10 karakter',
                        'max' => 'NIDN maksimal 15 karakter',
                        'required' => 'NIDN wajib diisi',
                    ]),                        
                Select::make('prodi')
                    ->label('Program Studi')
                    ->validationAttribute('Program Studi')
                    ->required()
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
                Tables\Columns\TextColumn::make('nama_kaprodi')
                    ->label('Nama Kaprodi')
                    ->limit(36),
                Tables\Columns\TextColumn::make('nidn')
                    ->label('NIDN'),                
                Tables\Columns\TextColumn::make('prodi')
                    ->label('Program Studi'),
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
