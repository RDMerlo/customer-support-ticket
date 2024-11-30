@if (count($arVideos) > 0)
<section class="dark-section">
    <div class="container">
        <h2 class="section-title">{{ __('sections.multimedia') }}</h2>

        <div class="video__row">
            @foreach ($arVideos as $item)
            <div class="video__item">
                <div class="video-card">
                    <div class="video-container">
                        {!! $item->frame !!}
                    </div>
                    <div class="video-title">{{ $item->title }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="section-button">
            <a href="{{ route('multimedia') }}" class="btn">Показать все</a>
        </div>
    </div>
</section>
@endif
