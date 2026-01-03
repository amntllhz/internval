<?php

namespace App\Filament\Resources\DospemResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Components\Tab;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubmissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'acceptSubmissions';
    
    protected static ?string $title = 'Mahasiswa Bimbingan';
    protected static ?string $description = 'Mahasiswa Bimbingan';

    protected static bool $isLazy = false;

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_mahasiswa')
            ->columns([
                Tables\Columns\TextColumn::make('nama_mahasiswa')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM'),                    
                Tables\Columns\TextColumn::make('instansi_tujuan')
                    ->label('Instansi Tujuan'),   
                Tables\Columns\TextColumn::make('prodi')
                    ->label('Program Studi'),                 
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])            
            ->actions([
                // 
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
