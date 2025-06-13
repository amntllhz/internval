<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmissionResource\Pages;
use App\Filament\Resources\SubmissionResource\RelationManagers;
use App\Models\Submission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;

class SubmissionResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {   
        $user = Filament::auth()->user();

        return $form
            ->schema([
                //
                TextInput::make('nama_mahasiswa')->disabled(),
                TextInput::make('nim')->disabled(),
                TextInput::make('prodi')->disabled(),
                TextInput::make('instansi_tujuan')->disabled(),
                DatePicker::make('tanggal_mulai')->disabled(),
                DatePicker::make('tanggal_selesai')->disabled(),

                // dosen hanya bisa melihat dan ubah status pengajuan
                Select::make('status_pengajuan')
                ->options([
                    'pending' => 'Pending',
                    'accepted' => 'Accepted',
                    'rejected' => 'Rejected',
                ])
                ->required()
                ->hidden($user->role !== 'dosen'),

                Textarea::make('alasan_penolakan')
                ->label('Alasan Penolakan')
                ->rows(3)
                ->hidden($user->role !== 'dosen'),

                // BAAK hanya bisa melihat dan ubah status surat
                Select::make('status_surat')
                ->options([
                    'none' => 'Belum dibuat',
                    'made' => 'Sudah dibuat',
                    'ready' => 'Siap diambil',
                ])
                ->required()
                ->hidden($user->role !== 'baak'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_mahasiswa'),
                Tables\Columns\TextColumn::make('nim'),
                Tables\Columns\TextColumn::make('instansi_tujuan'),
                Tables\Columns\TextColumn::make('status_pengajuan')->badge(),
                Tables\Columns\TextColumn::make('status_surat')->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmission::route('/create'),
            'edit' => Pages\EditSubmission::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
