<?php

namespace App\Filament\Resources\UnitResource\Pages;

use Filament\Actions;
use Filament\Support\Enums\ActionSize;
use App\Filament\Resources\UnitResource;
use Filament\Resources\Pages\ManageRecords;

class ManageUnits extends ManageRecords
{
    protected static string $resource = UnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->button()
                ->label('Tambah Satuan')
                ->createAnother(false)
                ->icon('heroicon-o-squares-plus')
                // ->color('success')
                // ->iconPosition('after')
                ->color('primary')
                ->size(ActionSize::Small)
                ->modalHeading('Tambah New Satuan')
                ->modalWidth('lg') // ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge, ThreeExtraLarge, FourExtraLarge, FiveExtraLarge, SixExtraLarge, SevenExtraLarge, and Screen
                ->modalSubheading('Create a new satuan record.'),
        ];
    }
}
