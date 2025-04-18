<?php

namespace App\Filament\Resources\ProdukResource\Pages;

use Filament\Actions;
use Filament\Facades\Filament;
use League\Flysystem\Visibility;
use Filament\Support\Enums\MaxWidth;
use Filament\Support\Enums\ActionSize;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\ProdukResource;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\KategoriResource;

class ManageProduks extends ManageRecords
{
    protected static string $resource = ProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ActionGroup::make([])
                ->label('Actions')
                ->button()
                ->icon('heroicon-o-plus')
                ->color('success')
                ->size(ActionSize::Small)
                ->actions([
                    Actions\CreateAction::make()
                        ->createAnother(false)
                        ->size(ActionSize::Small)
                        ->label('Add Produk')
                        ->icon('heroicon-o-squares-plus')
                        ->color('success')
                        ->modalHeading('Add New Produk')
                        ->modalSubheading('Create a new produk record.')
                        ->modalButton('Simpan'),
                    Actions\Action::make('tambah_ketegori')
                        ->size(ActionSize::Small)
                        ->label('Add Kategori')
                        ->icon('heroicon-o-swatch')
                        ->color('success')
                        ->modalWidth(MaxWidth::Small) //ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge, ThreeExtraLarge, FourExtraLarge, FiveExtraLarge, SixExtraLarge, SevenExtraLarge, and Screen
                        ->modalHeading('Add New Kategori')
                        ->modalSubheading('Create a new Kategori record.')
                        ->modalButton('Simpan')
                        ->form([
                            TextInput::make('nama')
                                ->required()
                                ->maxLength(255),
                            FileUpload::make('image')
                            ->label('Image/Gambar')
                            ->image()
                            ->maxSize(1024 * 1024 * 2) // 2MB
                            ->acceptedFileTypes(['image/*'])
                            ->preserveFilenames()
                            ->disk('public')
                            ->directory('/images')
                            ->enableOpen()
                            ->enableDownload()
                            ->enableReordering()
                            ->columnSpanFull(),
                        ])
                        ->action(fn($data) => Filament::getTenant()->kategoris()->create($data)->id),
                ]),
        ];
    }
}
