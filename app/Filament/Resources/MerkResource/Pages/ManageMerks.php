<?php

namespace App\Filament\Resources\MerkResource\Pages;

use Filament\Actions;
use Filament\Support\Enums\ActionSize;
use App\Filament\Resources\MerkResource;
use Filament\Resources\Pages\ManageRecords;

class ManageMerks extends ManageRecords
{
    protected static string $resource = MerkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Merk')
                ->createAnother(false)
                ->button()
                ->icon('heroicon-o-squares-plus')
                ->color('success')
                // ->iconPosition('after')
                ->size(ActionSize::ExtraSmall)
                ->modalHeading('Tambah New Produk')
                ->modalSubheading('Create a new produk record.'),
        ];
    }
}
