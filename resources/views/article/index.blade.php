@extends('layouts.app')

@section('content')
    <section id="articles" class="w-75 m-auto p-2">
        @foreach ($config['ranking'] as $rank => $items)
            <div class="card mb-3">
                <div class="card-header">{{ $rank + 1 }}位 {{ $items['genre'] }}</div>
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body bg-white">
                            @foreach ($items as $key => $name)
                                @if ($key !== 'genre')
                                    @component('article.components.index_card')
                                        @slot('faClass', $config['fa-class'][$key])
                                        @slot('key', $key)
                                        @slot('name', $name)
                                    @endcomponent
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
