<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Restaurant;

class Rank extends Model
{
    use HasFactory;

    protected $fillable = [
        'rank',
        'genre_name',
        'file_name',
    ];

    /**
     * 順位ごとの店を取得
     */
    public function restaurants(): HasMany
    {
        return $this->hasMany(Restaurant::class, 'rank_id', 'rank');
    }
}
