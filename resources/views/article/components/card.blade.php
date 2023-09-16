<div class="d-flex align-items-center">
    <div class="body-icon">
        <i class="w-100 fa-solid {{ $faClass }}"></i>
    </div>
    @if ($key === 'website')
        <a href="#" class="card-text">ホームページ</a>
    @else
        <p class="card-text">{{ $value }}</p>
    @endif
</div>
