@extends('layouts.app')

@section('genre'){{ $config['genre'] }}@endsection

@section('content')
    <section id="articles" class="w-75 m-auto p-2">
        @for ($i = 1; $i <= 10; $i++)
            <div class="card mb-3">
                <div class="card-header">{{ $i }}位 {{ $config['genre'] . $i }}</div>
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/img/yakiniku.jpg') }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body bg-white">
                            @foreach ($config as $key => $value)
                                @if ($key !== 'genre')
                                    @component('article.components.card')
                                        @slot('faClass', config('consts.articles.fa-class')[$key] ?? null)
                                        @slot('key', $key)
                                        @slot('value', $value)
                                    @endcomponent
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </section>
@endsection
