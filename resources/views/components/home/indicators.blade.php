@if (count($items) > 0)
<section class="dark-section bg-lighten">
    <div class="container">
        <h2 class="section-title">{{ __('sections.indicators') }}</h2>

        <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($items as $item)
                <div class="carousel-item @if($loop->first)active @endif">
                    <a href="{{ $item->link }}" class="carousel-cell-indicator">
                        <div class="indicator-desc">
                            <p>{{ $item->title }}</p>
                            {!! $item->description !!}
                        </div>
                        <div class="indicator-picture">
                            <img src="{{ Storage::url($item->image) }}" alt="">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <x-general.carousel-control id="carouselIndicators" />
        </div>

        <div class="section-button">
            <a href="{{ route('indicators') }}" class="btn">Все показатели</a>
        </div>
    </div>
</section>
@endif
