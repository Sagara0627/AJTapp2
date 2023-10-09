<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Rank;

class ArticleController extends Controller
{
    /**
     * トップページ
     */
    public function index()
    {
        $ranks = Rank::with('restaurants')
            ->orderBy('rank', 'asc')
            ->get();

        return view('article.index', [
            'ranks' => $ranks,
            'config' => config('consts.articles'),
        ]);
    }

    /**
     * 各ジャンルのランキングページ
     *
     * @param int $rankNum 順位
     */
    public function show($rankNum)
    {
        $rank = Rank::where('rank', $rankNum)
            ->with('restaurants')
            ->first();

        return view('article.show', [
            'rank' => $rank,
            'restaurants' => $rank->restaurants,
        ]);
    }
}
