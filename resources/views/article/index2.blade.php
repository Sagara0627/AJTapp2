@extends('layouts.app')

@section('genre')YouTube @endsection

@section('content')
    <section id="articles" class="w-75 m-auto p-2">
        <p class="text-end">{{ Carbon\Carbon::now()->format('Y年m月d日') }}時点</p>
        @foreach ($items as $index => $item)
            <div class="card mb-3">
                <div class="card-header fw-bold">{{ $index + 1 }}位 {{ $item->snippet->title }}</div>
                <div class="row g-0 overflow-hidden" style="max-height: 14rem">
                    <div class="col-md-4">
                        <img src="{{ $item->snippet->thumbnails->medium->url }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-4 bg-white">
                        <div class="card-body">
                            {!! nl2br(e($item->snippet->description)) !!}
                        </div>
                    </div>
                    <div class="col-md-4 bg-white border-start">
                        <div class="card-body">
                            <div class="video-wrapper border rounded-3 p-3">
                                <p class="mb-2">
                                    <a href="{{ "https://www.youtube.com/watch?v={$item->id->videoId}" }}" target="_blank">動画はこちら <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                </p>
                                <p class="mb-2">アップロード日: {{ date('Y年m月d日', strtotime($item->snippet->publishedAt)) }}</p>
                                <p class="mb-2">視聴回数: {{ number_format($item->snippet->viewCount, 0, ',') }}回</p>
                                <p class="mb-2">いいね数: {{ number_format($item->snippet->likeCount) }}回</p>
                                <p class="mb-2">コメント数: {{ number_format($item->snippet->commentCount) }}回</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
