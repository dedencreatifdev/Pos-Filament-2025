<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Support\Enums\ActionSize;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ManageRecords;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah User')
                ->createAnother(false)
                ->button()
                ->icon('heroicon-o-squares-plus')
                ->color('success')
                // ->iconPosition('after')
                ->size(ActionSize::ExtraSmall),
        ];
    }
}
