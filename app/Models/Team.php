<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory, Notifiable, HasUuids;
    protected $table = 'teams';
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function produks(): BelongsToMany
    {
        return $this->belongsToMany(Produk::class);
    }
    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class);
    }
}
