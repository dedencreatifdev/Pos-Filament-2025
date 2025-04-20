<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory, Notifiable, HasUuids;

    protected $guarded = [];

    public function team(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * Get the user that owns the Produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function getKategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function getSatuan(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function getMerk(): BelongsTo
    {
        return $this->belongsTo(Merk::class, 'merk_id', 'id');
    }

    public function getGudang(): BelongsTo
    {
        return $this->belongsTo(Gudang::class, 'gudang_id', 'id');
    }
}
