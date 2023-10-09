@extends('layouts.app')

@section('genre')日本食@endsection

@section('content')
    <section id="articles" class="w-75 m-auto p-2">
        <p class="text-end">{{ Carbon\Carbon::now()->format('Y年m月d日') }}時点</p>
        @foreach ($ranks as $rank)
            <div class="card mb-3">
                <div class="card-header">{{ $rank->rank }}位 {{ $rank->genre_name }}</div>
                <div class="row g-0 overflow-hidden" style="max-height: 14rem">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/img/' . $rank->file_name) }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body bg-white">
                            @foreach ($rank->restaurants as $restaurant)
                                <div class="d-flex align-items-center">
                                    @if ($restaurant->rank >= 4)
                                        {{-- 4位以降の表示 --}}
                                        <div class="body-icon"></div>
                                        <a href="{{ route('article.show', $rank->rank) }}/#rank-{{ $restaurant->rank }}" class="card-text">and more</a>
                                    @else
                                        {{-- 1位から3位までの表示 --}}
                                        <div class="body-icon">
                                            <i class="w-100 fa-solid fa-medal"></i>
                                        </div>
                                        <p>{{ $restaurant->rank . '位' }} <a href="{{ route('article.show', $rank->rank) }}/#rank-{{ $restaurant->rank }}" class="card-text">{{ $restaurant->name }}</a></p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
