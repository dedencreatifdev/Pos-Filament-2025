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
                ->icon('heroicon-o-plus')
                // ->color('success')
                ->iconPosition('after')
                ->size(ActionSize::Small),
        ];
    }
}
