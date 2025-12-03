<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Submission;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use App\Models\SubmissionAccepted;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubmissionAcceptedResource\Pages;
use App\Filament\Resources\SubmissionAcceptedResource\RelationManagers;

class SubmissionAcceptedResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationGroup = 'Data Pengajuan';
    protected static ?string $navigationLabel = 'Accepted';
    protected static ?string $pluralModelLabel = 'Accepted';
    protected static ?string $slug = 'submission-accepted';

    public static function getEloquentQuery(): Builder
    {
        $user = Filament::auth()->user();
        $query = parent::getEloquentQuery();

        // Mapping role ke prodi
        $roleToProdi = [
            'dosen_informatika' => 'S1 Informatika',
            'dosen_mesin' => 'S1 Teknik Mesin',
        ];

        // Filter prodi sesuai role dosen
        $prodi = $roleToProdi[$user->role] ?? null;
        if ($prodi) {
            $query->where('prodi', $prodi);
        }

        // Filter status pending
        $query->where('status_pengajuan', 'accepted');

        return $query;
    }

    public static function form(Form $form): Form
    {   
        $user = Filament::auth()->user();

        return $form
            ->schema([                                

                Section::make('Verifikasi Pengajuan')
                ->icon('heroicon-o-pencil-square')
                ->iconColor('primary')
                ->description('Lakukan pembaruan status pengajuan')
                ->schema([
                    // dosen hanya bisa melihat dan ubah status pengajuan
                    ToggleButtons::make('status_pengajuan')
                    ->inline()
                        ->options([
                            'pending' => 'Pending',
                            'accepted' => 'Accepted',
                            'rejected' => 'Rejected',
                        ])
                        ->colors([
                            'pending' => 'info',
                            'accepted' => 'primary',
                            'rejected' => 'danger',                          
                        ])
                        ->icons([
                            'pending' => 'heroicon-o-clock',
                            'accepted' => 'heroicon-o-check-circle',
                            'rejected' => 'heroicon-o-x-circle',
                        ])
                        ->reactive()
                        ->visible(fn () => $user->role === 'dosen_informatika' || $user->role === 'dosen_mesin'),                       

                    Textarea::make('alasan_penolakan')
                        ->label('Alasan Penolakan')
                        ->rows(3)                        
                        ->required(fn ($get) => $get('status_pengajuan') === 'rejected')
                        ->dehydrated(fn ($get) => $get('status_pengajuan') === 'rejected')
                        ->visible(fn () => $user->role === 'dosen_informatika' || $user->role === 'dosen_mesin'),
                                        
                ])->columnSpan(2)->columns(1),
                                
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_mahasiswa')
                    ->label('Nama Mahasiswa'),
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),                
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
            'index' => Pages\ListSubmissionAccepteds::route('/'),
            'create' => Pages\CreateSubmissionAccepted::route('/create'),
            'edit' => Pages\EditSubmissionAccepted::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['dosen_informatika', 'dosen_mesin']);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getEloquentQuery()->count();
    }
}
