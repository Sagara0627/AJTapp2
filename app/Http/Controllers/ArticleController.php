<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * トップページ
     */
    public function index()
    {
        return view('article.index', [
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
        return view('article.show', [
            'config' => config('consts.articles.ranking')[$rank],
        ]);
    }
}
