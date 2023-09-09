<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // トップページ
    public function index()
    {
        return view('article.index');
    }
}
