<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Submission;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use App\Models\SubmissionExpired;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\SubmissionExporter;
use Filament\Tables\Actions\ExportBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubmissionExpiredResource\Pages;
use App\Filament\Resources\SubmissionExpiredResource\RelationManagers;

class SubmissionExpiredResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-no-symbol';
    protected static ?string $navigationGroup = 'Data Pengajuan';
    protected static ?string $navigationLabel = 'Expired';
    protected static ?string $pluralModelLabel = 'Expired';
    protected static ?string $slug = 'submission-expired';
    protected static ?int $navigationSort = 4;

    public static function getEloquentQuery(): Builder
    {
        $user = Filament::auth()->user();
        $query = parent::getEloquentQuery();

        // Mapping role ke prodi
        $roleToProdi = [
            'kaprodi_informatika' => 'S1 Informatika',
            'kaprodi_mesin' => 'S1 Teknik Mesin',
            'kaprodi_manajemenit' => 'D3 Manajemen Informatika',
        ];

        // Filter prodi sesuai role dosen
        $prodi = $roleToProdi[$user->role] ?? null;
        if ($prodi) {
            $query->where('prodi', $prodi);
        }

        // Filter status pending
        $query->where('status_pengajuan', 'expired');

        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
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
                        'expired' => 'warning',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'accepted' => 'heroicon-o-check-circle',
                        'rejected' => 'heroicon-o-x-circle',
                        'expired' => 'heroicon-o-no-symbol',
                    }),
                Tables\Columns\TextColumn::make('status_surat')
                    ->label('Status Surat')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'none' => 'gray',
                        'made' => 'warning',
                        'ready' => 'success',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'none' => 'heroicon-o-clock',
                        'made' => 'heroicon-o-cloud-arrow-up',
                        'ready' => 'heroicon-o-bell-alert',
                    }),  
            ])
            ->emptyStateDescription('Data akan ditampilkan ketika ada pengajuan')
            ->emptyStateIcon('heroicon-o-bookmark-slash')
            ->searchPlaceholder('Cari NIM')
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('primary'),
            ])
            ->bulkActions([                
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()                        
                        ->exporter(SubmissionExporter::class)
                        ->label('Ekspor Data Terpilih'),                
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
            'index' => Pages\ListSubmissionExpireds::route('/'),
            'create' => Pages\CreateSubmissionExpired::route('/create'),
            'edit' => Pages\EditSubmissionExpired::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['kaprodi_informatika', 'kaprodi_mesin','kaprodi_manajemenit']);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getEloquentQuery()->count();
    }
}
