@extends('layouts.app')

@section('genre'){{ $rank->genre_name }}@endsection

@section('content')
    <section id="articles" class="w-75 m-auto p-2">
        <p class="text-end">{{ Carbon\Carbon::now()->format('Y年m月d日') }}時点</p>
        @foreach ($restaurants as $restaurant)
            <div class="card mb-3">
                <div class="card-header fw-bold" id="rank-{{ $restaurant->rank }}">{{ $restaurant->rank }}位 {{ $restaurant->name }}</div>
                <div class="row g-0 overflow-hidden" style="max-height: 14rem">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/img/' . $restaurant->file_name) }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body bg-white">
                            {{-- 店名 --}}
                            <div class="d-flex align-items-center">
                                <div class="body-icon">
                                    <i class="w-100 fa-solid fa-shop"></i>
                                </div>
                                <p class="card-text">{{ $restaurant->name }}</p>
                            </div>
                            {{-- 最寄駅 --}}
                            <div class="d-flex align-items-center">
                                <div class="body-icon">
                                    <i class="w-100 fa-solid fa-train-subway"></i>
                                </div>
                                <p class="card-text">{{ $restaurant->nearest_station }}</p>
                            </div>
                            {{-- 住所 --}}
                            <div class="d-flex align-items-center">
                                <div class="body-icon">
                                    <i class="w-100 fa-solid fa-location-dot"></i>
                                </div>
                                <p class="card-text">{{ $restaurant->address }}</p>
                            </div>
                            {{-- ホームページ --}}
                            <div class="d-flex align-items-center">
                                <div class="body-icon">
                                    <i class="w-100 fa-solid fa-house"></i>
                                </div>
                                @if ($restaurant->website)
                                    <a href="{{ $restaurant->website }}" class="card-text">{{ $restaurant->website ?? '-' }}</a>
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
