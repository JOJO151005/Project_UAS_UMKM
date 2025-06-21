<?php

namespace App\Filament\Resources\ProvinsiResource\Pages;

use App\Filament\Resources\ProvinsiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProvinsi extends EditRecord
{
    protected static string $resource = ProvinsiResource::class;

    // Fungsi ini untuk menambahkan tombol aksi di header halaman edit, seperti tombol "Delete"
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}