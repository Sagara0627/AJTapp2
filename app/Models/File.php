<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre',
        'genre_rank',
        'file_path',
        'file_type',
        'rank',
    ];

    // ジャンル別ランキングサイトで表示
    public const OUTSIDE_GENRE = 1;
    // ジャンル内ランキングサイトで表示
    public const WITHIN_GENRE = 2;
}
