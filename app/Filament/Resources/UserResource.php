<?php

namespace App\Filament\Resources;

use Dom\Text;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Data Internal';
    protected static ?string $navigationLabel = 'Akses Pengguna';
    protected static ?string $pluralModelLabel = 'Akses Pengguna';
    protected static ?string $slug = 'akses-pengguna';
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->label('Nama Pengguna')
                    ->validationAttribute('Nama Pengguna')
                    ->rules([
                        'required',
                        'min:3',
                        'max:25',
                        'regex:/^[A-Za-z\s_]+$/',
                    ])                    
                    ->validationMessages([
                        'regex' => 'Nama Pengguna hanya boleh mengandung huruf, spasi, dan underscore',
                        'min' => 'Nama Pengguna minimal 3 karakter',
                        'max' => 'Nama Pengguna maksimal 25 karakter',
                        'required' => 'Nama Pengguna wajib diisi',
                    ])
                    ->required(),
                TextInput::make('email')
                    ->label('E-mail')
                    ->validationAttribute('E-mail')
                    ->rules([
                        'required',
                    ])
                    ->validationMessages([
                        'required' => 'E-mail wajib diisi',
                    ])
                    ->email(),                    
                TextInput::make('password')                    
                    ->password()
                    ->validationAttribute('Password')
                    ->rules([
                        'min:8',
                        'max:12',
                        'required'
                    ])
                    ->validationMessages([
                        'min' => 'Password minimal 8 karakter',
                        'max' => 'Password maksimal 12 karakter',
                        'required' => 'Password wajib diisi',
                    ])
                    ->label('Password')                    
                    ->revealable(),
                Select::make('role')
                    ->label('Role Pengguna')
                    ->validationAttribute('Role Pengguna')
                    ->validationMessages([
                        'required' => 'Role wajib diisi',
                    ])
                    ->required()
                    ->options([
                        'baak' => 'BAAK',
                        'kaprodi_informatika' => 'Kaprodi Informatika',
                        'kaprodi_mesin' => 'Kaprodi Teknik Mesin',
                        'kaprodi_manajemenit' => 'Kaprodi Manajemen Informatika',
                    ])->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pengguna'),
                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail'),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role Pengguna'),
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

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['baak']);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
