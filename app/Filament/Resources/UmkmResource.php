<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmResource\Pages;
use App\Filament\Resources\UmkmResource\RelationManagers;
use App\Models\Umkm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UmkmResource extends Resource
{
    protected static ?string $model = Umkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'UMKM';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar UMKM')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('pemilik')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('alamat')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Usaha & Kontak')
                    ->schema([
                        Forms\Components\TextInput::make('modal')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\Select::make('rating')
                            ->options([
                                1 => '⭐',
                                2 => '⭐⭐',
                                3 => '⭐⭐⭐',
                                4 => '⭐⭐⭐⭐',
                                5 => '⭐⭐⭐⭐⭐',
                            ]),
                        Forms\Components\TextInput::make('website')
                            ->maxLength(255)
                            ->url(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                    ])->columns(2),
                
                Forms\Components\Section::make('Kategori & Lokasi')
                    ->schema([
                        Forms\Components\Select::make('kategori_umkm_id')
                            ->relationship('kategoriUmkm', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('kabkota_id')
                            ->relationship('kabkota', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('pembina_id')
                            ->relationship('pembina', 'nama')
                            ->searchable()
                            ->preload()
                            ->nullable() // Boleh kosong
                            ->label('Pembina (Opsional)'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->description(fn (Umkm $record): string => $record->pemilik),
                Tables\Columns\TextColumn::make('kategoriUmkm.nama')
                    ->badge() // Tampilkan sebagai badge
                    ->sortable(),
                Tables\Columns\TextColumn::make('kabkota.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pembina.nama')
                    ->sortable()
                    ->default('Belum ada pembina') // Teks jika pembina null
                    ->toggleable(isToggledHiddenByDefault: true), // Sembunyikan default
                Tables\Columns\TextColumn::make('modal')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\IconColumn::make('rating')
                    ->icon('heroicon-o-star')
                    ->color('warning'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori_umkm_id')
                    ->relationship('kategoriUmkm', 'nama')
                    ->label('Filter Kategori'),
                Tables\Filters\SelectFilter::make('kabkota_id')
                    ->relationship('kabkota', 'nama')
                    ->label('Filter Kab/Kota'),
                Tables\Filters\SelectFilter::make('rating')
                    ->options([
                        1 => 'Rating 1',
                        2 => 'Rating 2',
                        3 => 'Rating 3',
                        4 => 'Rating 4',
                        5 => 'Rating 5',
                    ]),
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
            'index' => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}