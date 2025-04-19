<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Produk;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukResource\RelationManagers;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Set;

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
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(25),
                Forms\Components\TextInput::make('kode')
                    ->required()
                    ->maxLength(25),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(50)
                    ->columnSpanFull(),
                // Forms\Components\TextInput::make('kategori_id')
                //     ->required()
                //     ->maxLength(36),

                Forms\Components\Select::make('kategori_id')
                    ->label('Kategori')
                    ->options(Filament::getTenant()->kategoris->pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('merk_id')
                    ->label('Merk')
                    ->options(Filament::getTenant()->merks->pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('merk_id')
                    ->required()
                    ->maxLength(36),
                Forms\Components\Select::make('unit_id')
                    ->label('Satuan')
                    ->options(Filament::getTenant()->units->pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('unit_id')
                    ->required()
                    ->maxLength(36),
                Forms\Components\Textarea::make('deskripsi')
                    ->rows(5)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('spesifikasi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('harga')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('disc_max')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('alert')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('berat')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('panjang')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('lebar')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('tinggi')
                    ->numeric()
                    ->default(0),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\TextInput::make('file')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('active'),
            ])
            ->columns(3);
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

                Tables\Columns\TextColumn::make('status'),
            ])
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
