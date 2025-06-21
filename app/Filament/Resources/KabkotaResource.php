<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KabkotaResource\Pages;
use App\Filament\Resources\KabkotaResource\RelationManagers;
use App\Models\Kabkota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
// Tidak perlu 'use' tambahan karena kita menggunakan namespace lengkap untuk Notifikasi

class KabkotaResource extends Resource
{
    protected static ?string $model = Kabkota::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = 'Wilayah';

    protected static ?string $modelLabel = 'Kabupaten/Kota';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('provinsi_id')
                    ->relationship('provinsi', 'nama') // Menampilkan relasi ke tabel provinsi berdasarkan kolom nama
                    ->searchable()
                    ->preload() // Memuat opsi saat halaman dibuka
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('latitude')
                    ->numeric(),
                Forms\Components\TextInput::make('longitude')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                // Menampilkan nama provinsi dari relasi
                Tables\Columns\TextColumn::make('provinsi.nama')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan filter berdasarkan provinsi
                Tables\Filters\SelectFilter::make('provinsi')
                    ->relationship('provinsi', 'nama')
                    ->label('Filter by Provinsi'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Gunakan try...catch yang lebih umum untuk menangkap semua jenis error
                Tables\Actions\DeleteAction::make()
                    ->action(function ($record) {
                        try {
                            // Langsung coba hapus
                            $record->delete();

                            // Kirim notifikasi sukses jika berhasil
                            \Filament\Notifications\Notification::make()
                                ->title('Berhasil Dihapus')
                                ->body('Data Kabupaten/Kota telah berhasil dihapus.')
                                ->success()
                                ->send();

                        } catch (\Exception $e) {
                            // Jika GAGAL karena APAPUN, kirim notifikasi error
                            \Filament\Notifications\Notification::make()
                                ->title('Gagal Menghapus')
                                ->body('Terjadi kesalahan. Pastikan tidak ada data UMKM yang terkait dengan Kabupaten/Kota ini.')
                                ->danger()
                                ->send();
                        }
                    }),
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
            'index' => Pages\ListKabkotas::route('/'),
            'create' => Pages\CreateKabkota::route('/create'),
            'edit' => Pages\EditKabkota::route('/{record}/edit'),
        ];
    }
}