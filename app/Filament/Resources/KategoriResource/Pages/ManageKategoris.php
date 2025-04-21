<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use Filament\Actions;
use Filament\Support\Enums\ActionSize;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\KategoriResource;

class ManageKategoris extends ManageRecords
{
    protected static string $resource = KategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Kategori')
                ->createAnother(false)
                ->button()
                ->icon('heroicon-o-squares-plus')
                ->color('success')
                // ->iconPosition('after')
                ->size(ActionSize::ExtraSmall)
                ->modalHeading('Tambah Kategori')
                ->modalWidth('lg') // ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge, ThreeExtraLarge, FourExtraLarge, FiveExtraLarge, SixExtraLarge, SevenExtraLarge, and Screen
                ->modalSubheading('Create a new kategori record.'),
        ];
    }
}
