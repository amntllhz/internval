<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Kaprodi;
use Filament\Forms\Form;
use App\Models\Submission;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use App\Models\SubmissionManajemenit;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\SubmissionExporter;
use Filament\Forms\Components\ToggleButtons;
use Filament\Actions\Exports\Enums\ExportFormat;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubmissionManajemenitResource\Pages;
use App\Filament\Resources\SubmissionManajemenitResource\RelationManagers;

class SubmissionManajemenitResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-window';
    protected static ?string $navigationGroup = 'Data Pengajuan';
    protected static ?string $navigationLabel = 'D3 Manajemen Informatika';
    protected static ?string $pluralModelLabel = 'D3 Manajemen Informatika';
    protected static ?string $slug = 'submission-manajemenit';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([                

                Section::make('Verifikasi Pengajuan')
                ->icon('heroicon-o-pencil-square')
                ->iconColor('primary')
                ->description('Lakukan pembaruan status pengajuan')
                ->schema([                                        

                    // BAAK hanya bisa melihat dan ubah status surat
                    ToggleButtons::make('status_surat')
                        ->inline()
                        ->options([
                            'none' => 'Belum dibuat',
                            'made' => 'Sedang dibuat',
                            'ready' => 'Siap diambil',
                        ])
                        ->colors([
                            'none' => 'info',
                            'made' => 'warning',
                            'ready' => 'primary',                          
                        ])
                        ->icons([
                            'none' => 'heroicon-o-clock',
                            'made' => 'heroicon-o-cloud-arrow-up',
                            'ready' => 'heroicon-o-bell-alert',
                        ])
                        ->reactive()
                        ->required()                                        
                ]),
                                
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                //
                Tables\Columns\TextColumn::make('nama_mahasiswa')
                    ->label('Nama Mahasiswa'),
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),                
                Tables\Columns\TextColumn::make('status_pengajuan')
                    ->label('Status Pengajuan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'accepted' => 'success',
                        'rejected' => 'danger',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'accepted' => 'heroicon-o-check-circle',
                        'rejected' => 'heroicon-o-x-circle',
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
                TextColumn::make('created_at')
                    ->label('Waktu Dibuat')
                    ->date('d M Y'),
            ])
            ->emptyStateDescription('Data akan ditampilkan ketika ada pengajuan')
            ->emptyStateIcon('heroicon-o-bookmark-slash')
            ->searchPlaceholder('Cari NIM')
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                   Tables\Actions\ViewAction::make()
                    ->hidden(fn (Submission $record): bool => $record->status_pengajuan == 'accepted'),
                    Tables\Actions\EditAction::make()                    
                    ->visible(fn (Submission $record): bool => $record->status_pengajuan == 'accepted'),                    
                    Action::make('download')
                    ->label('Download')                    
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function ($record) {

                        $kaprodi = Kaprodi::where('prodi', $record->prodi)->first();

                        if (! $kaprodi) {
                            $kaprodi = (object) [
                                'nama_kaprodi' => '',
                                'nidn' => '',
                            ];
                        }

                        Carbon::setLocale('id');

                        // Gunakan BARRYVDH PDF FACADE (bukan dompdf langsung!)
                        $pdf = Pdf::loadView('pdf.download', [
                            'submission' => $record,
                            'kaprodi' => $kaprodi
                        ]);

                        return response()->streamDownload(function() use ($pdf){
                            echo $pdf->output();
                        }, 'submission-'. $record->nim .'.pdf');
                    })      
                    ->visible(fn (Submission $record): bool => $record->status_pengajuan == 'accepted'), 
                    Tables\Actions\DeleteAction::make(),
                ])
                ->color('gray'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->where('prodi', 'D3 Manajemen Informatika');
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
            'index' => Pages\ListSubmissionManajemenits::route('/'),
            'create' => Pages\CreateSubmissionManajemenit::route('/create'),
            'edit' => Pages\EditSubmissionManajemenit::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return $record->status_pengajuan === 'accepted';
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return in_array($user->role, ['baak']);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getEloquentQuery()->count();
    }
}
