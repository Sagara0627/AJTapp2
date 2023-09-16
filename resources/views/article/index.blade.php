@extends('layouts.app')

@section('genre')日本食@endsection

@section('content')
    <section id="articles" class="w-75 m-auto p-2">
        @foreach ($config['ranking'] as $rank => $items)
            <div class="card mb-3">
                <div class="card-header">{{ $rank + 1 }}位 {{ $items['genre'] }}</div>
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/img/yakiniku.jpg') }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body bg-white">
                            @foreach ($items as $key => $name)
                                @if ($key !== 'genre')
                                    <div class="d-flex align-items-center">
                                        <div class="body-icon">
                                            <i class="w-100 fa-solid {{ $config['fa-class'][$key] }}"></i>
                                        </div>
                                        @if ($key === 'website')
                                            <a href="{{ route('article.show', $rank) }}" class="card-text">{{ $name }}</a>
                                        @else
                                            <p class="card-text">{{ $name }}</p>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
