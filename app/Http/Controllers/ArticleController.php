<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rank;
use Google_Client;
use Google_Service_YouTube;

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

    /**
     * YouTubeのランキングトップページ
     *
     * @param string $channelId
     */
    public function index2($channelId)
    {
        // Googleへの接続情報のインスタンスを作成
        $client = new Google_Client();
        // APIキーを用いてインスタンスへ接続
        $client->setDeveloperKey(config('consts.youtube.api_key'));

        // Youtubeのデータへアクセス可能なインスタンスを作成
        $youtube = new Google_Service_YouTube($client);

        // 検索して動画一覧を取得
        $items = $youtube->search->listSearch('snippet', [
            // チャンネルIDの特定
            'channelId' => $channelId,
            // 視聴回数の多い順
            'order' => 'viewCount',
            // 上位10件
            'maxResults' => 10,
            // 動画を取得
            'type' => 'video',
        ]);

        foreach ($items->items as $index => $item) {
            \Log::info('動画タイトル', ['title' => $items->items[$index]->snippet->title]);
            // 動画の詳細情報と統計情報を取得
            $videos = $youtube->videos->listVideos(['snippet', 'statistics'], [
                'id' => $item->id->videoId,
            ])->items[0];

            // 概要欄を全文に更新
            $items->items[$index]->snippet->description = $videos->snippet->description;
            // 視聴回数を取得
            $items->items[$index]->snippet->viewCount = $videos->statistics->viewCount;
            // いいね数を取得
            $items->items[$index]->snippet->likeCount = $videos->statistics->likeCount;
            // コメント数を取得
            $items->items[$index]->snippet->commentCount = $videos->statistics->commentCount;

            // Youtubeから取得したタイトルはHTMLエスケープされているため、元の文章を復元
            $items->items[$index]->snippet->title = htmlspecialchars_decode(
                $items->items[$index]->snippet->title,
                ENT_QUOTES
            );
        }

        return view('article.index2', [
            'items' => $items->getItems(),
        ]);
    }
}
