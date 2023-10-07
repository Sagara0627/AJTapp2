@extends('layouts.app')

@section('genre')日本食@endsection

@section('content')
    <section id="articles" class="w-75 m-auto p-2">
        @foreach ($config['ranking'] as $rank => $items)
            <div class="card mb-3">
                <div class="card-header">{{ $rank }}位 {{ $items['genre'] }}</div>
                <div class="row g-0 overflow-hidden" style="max-height: 14rem">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/img/' . $files[$rank]) }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body bg-white">
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="d-flex align-items-center">
                                    @if ($i == 4)
                                        {{-- 4位以降の表示 --}}
                                        <div class="body-icon"></div>
                                        <a href="{{ route('article.show', $rank) }}/#rank-{{ $i }}" class="card-text">and more</a>
                                    @else
                                        {{-- 1位から3位までの表示 --}}
                                        <div class="body-icon">
                                            <i class="w-100 fa-solid fa-medal"></i>
                                        </div>
                                        <p>{{ $i . '位' }} <a href="{{ route('article.show', $rank) }}/#rank-{{ $i }}" class="card-text">{{ $items['name'] }}</a></p>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
