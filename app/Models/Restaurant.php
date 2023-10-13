<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Rank;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'rank_id',
        'name',
        'nearest_station',
        'prefecture',
        'city',
        'street',
        'website',
        'file_name',
        'rank',
    ];

    /**
     * 店の順位を取得
     */
    public function rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class, 'rank', 'rank_id');
    }

    /**
     * 住所を取得
     */
    public function address(): Attribute
    {
        return new Attribute(
            get:function () {
                return $this->prefecture . $this->city . $this->street;
            }
        );
    }
}
