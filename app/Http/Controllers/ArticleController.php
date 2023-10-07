<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class ArticleController extends Controller
{
    /**
     * トップページ
     */
    public function index()
    {
        $files = File::where('file_type', File::OUTSIDE_GENRE)
            ->pluck('file_path', 'rank');

        return view('article.index', [
            'files' => $files,
            'config' => config('consts.articles'),
        ]);
    }

    /**
     * 各ジャンルのランキングページ
     *
     * @param int $rank
     */
    public function show($rank)
    {
        $files = File::where('file_type', File::WITHIN_GENRE)
            ->where('genre_rank', $rank)
            ->pluck('file_path', 'rank');

        return view('article.show', [
            'files' => $files,
            'config' => config('consts.articles.ranking')[$rank],
        ]);
    }
}
