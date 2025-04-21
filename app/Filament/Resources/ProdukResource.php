<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Produk;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Actions\Action;
use App\Filament\Resources\ProdukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukResource\RelationManagers;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Produk List';
    protected static ?string $navigationGroup = 'Produk';
    protected static ?string $navigationBadge = 'Produks';
    protected static ?string $navigationBadgeColor = 'success';
    protected static ?string $slug = 'daftar-produk';
    protected static ?string $label = 'Produk';
    protected static ?string $pluralLabel = 'Produks';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('type')
                    ->required()
                    ->options([
                        'Barang' => 'Barang',
                        'Jasa' => 'Jasa',
                    ]),
                TextInput::make('kode')
                    ->columnSpan(2)
                    // ->inlineLabel()
                    ->required()
                    ->maxLength(25),
                TextInput::make('nama')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(50)
                    ->columnSpanFull(),

                // TextInput::make('kategori_id')
                //     ->required()
                //     ->maxLength(36),

                Select::make('kategori_id')
                    ->inlineLabel()
                    ->label('Kategori')
                    ->options(Filament::getTenant()->kategoris->pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('merk_id')
                    ->inlineLabel()
                    ->label('Merk')
                    ->options(Filament::getTenant()->merks->pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('unit_id')
                    ->inlineLabel()
                    ->label('Satuan')
                    ->options(Filament::getTenant()->units->pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('gudang_id')
                    ->inlineLabel()
                    ->label('Gudang')
                    ->options(Filament::getTenant()->gudangs->pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('spesifikasi')
                    ->inlineLabel()
                    ->maxLength(255),
                TextInput::make('status')
                    ->inlineLabel()
                    ->required()
                    ->maxLength(255)
                    ->default('active'),


                Textarea::make('deskripsi')
                    ->columnSpanFull()
                    ->rows(5)
                    ->columnSpanFull(),
                TextInput::make('harga')
                    ->inlineLabel()
                    ->numeric()
                    ->default(0),
                TextInput::make('disc_max')
                    ->inlineLabel()
                    ->numeric()
                    ->default(0),
                TextInput::make('alert')
                    ->inlineLabel()
                    ->numeric()
                    ->default(0),
                TextInput::make('berat')
                    ->inlineLabel()
                    ->numeric()
                    ->default(0),
                TextInput::make('panjang')
                    ->inlineLabel()
                    ->numeric()
                    ->default(0),
                TextInput::make('lebar')
                    ->inlineLabel()
                    ->numeric()
                    ->default(0),
                TextInput::make('tinggi')
                    ->inlineLabel()
                    ->numeric()
                    ->default(0),

                    Split::make([
                        Section::make([
                            FileUpload::make('image')
                                ->columnSpan(2)
                                ->image(),
                        ]),
                        Section::make([
                            TextInput::make('file')
                                ->columnSpan(1)
                                ->maxLength(255),
                        ])->grow(false),
                    ])
                    ->from('md')
                    ->columnSpan(3)

            ])
            ->columns(3)
        ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('getKategori.nama')
                    ->label('Kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('getSatuan.nama')
                    ->label('Satuan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('getMerk.nama')
                    ->label('Merk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('getMerk.nama')
                    ->label('Merk')
                    ->searchable(),

                Tables\Columns\TextColumn::make('harga')
                    ->alignEnd()
                    ->numeric(),
                Tables\Columns\TextColumn::make('hpp')
                    ->default('0.00')
                    ->label('Hpp')
                    ->alignEnd()
                    ->numeric(decimalPlaces: 2),
                Tables\Columns\TextColumn::make('disc_max')
                    ->label('Disc Max')
                    ->numeric(),
                Tables\Columns\TextColumn::make('alert')
                    ->numeric(),

                Tables\Columns\TextColumn::make('getGudang.nama')
                    ->label('Gudang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->striped()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProduks::route('/'),
        ];
    }
}
