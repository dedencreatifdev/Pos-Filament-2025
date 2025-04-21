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
                ->icon('heroicon-o-squares-plus')
                ->color('success')
                // ->iconPosition('after')
                ->size(ActionSize::ExtraSmall)
                ->actions([
                    Actions\CreateAction::make()
                        ->createAnother(false)
                        ->size(ActionSize::Small)
                        ->label('Tambah Produk')
                        ->icon('heroicon-o-squares-plus')
                        ->color('success')
                        ->modalHeading('Tambah New Produk')
                        ->modalSubheading('Create a new produk record.')
                    // ->modalButton('Simpan')
                    ,
                    Actions\Action::make('tambah_satuan')
                        ->size(ActionSize::Small)
                        ->label('Tambah Satuan')
                        ->icon('heroicon-o-swatch')
                        ->color('success')
                        ->modalWidth(MaxWidth::Small) //ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge, ThreeExtraLarge, FourExtraLarge, FiveExtraLarge, SixExtraLarge, SevenExtraLarge, and Screen
                        ->modalHeading('Tambah New Satuan')
                        ->modalSubheading('Create a new Satuan record.')
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
                        ->action(fn($data) => Filament::getTenant()->units()->create($data)->id),
                    Actions\Action::make('tambah_ketegori')
                        ->size(ActionSize::Small)
                        ->label('Tambah Kategori')
                        ->icon('heroicon-o-swatch')
                        ->color('success')
                        ->modalWidth(MaxWidth::Small) //ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge, ThreeExtraLarge, FourExtraLarge, FiveExtraLarge, SixExtraLarge, SevenExtraLarge, and Screen
                        ->modalHeading('Tambah New Kategori')
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
                    Actions\Action::make('tambah_merk')
                        ->size(ActionSize::Small)
                        ->label('Tambah Merk')
                        ->icon('heroicon-o-swatch')
                        ->color('success')
                        ->modalWidth(MaxWidth::Small) //ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge, ThreeExtraLarge, FourExtraLarge, FiveExtraLarge, SixExtraLarge, SevenExtraLarge, and Screen
                        ->modalHeading('Tambah New Merk')
                        ->modalSubheading('Create a new Merk record.')
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
                        ->action(fn($data) => Filament::getTenant()->merks()->create($data)->id),
                ]),
        ];
    }
}
