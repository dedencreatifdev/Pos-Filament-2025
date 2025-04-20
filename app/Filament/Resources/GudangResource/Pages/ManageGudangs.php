<?php

namespace App\Filament\Resources\GudangResource\Pages;

use Filament\Actions;
use Filament\Support\Enums\MaxWidth;
use Filament\Support\Enums\ActionSize;
use App\Filament\Resources\GudangResource;
use Filament\Resources\Pages\ManageRecords;

class ManageGudangs extends ManageRecords
{
    protected static string $resource = GudangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->createAnother(false)
                ->size(ActionSize::ExtraSmall)
                ->label('Tambah Gudang')
                ->icon('heroicon-o-squares-plus')
                ->color('success')
                ->modalHeading('Add New Gudang')
                ->modalWidth(MaxWidth::Medium) // ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge, ThreeExtraLarge, FourExtraLarge, FiveExtraLarge, SixExtraLarge, SevenExtraLarge, and Screen
                ->modalSubheading('Create a new Gudang record.')
                ->modalButton('Simpan'),
        ];
    }
}
