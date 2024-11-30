@if (count($arNews) > 0)
<section class="news">
    <div class="container">
        <h2 class="section-title">{{ __('sections.news') }}</h2>

        <div class="news__row">
            <div class="news__latest">
                <a href="{{ route('news_detail', ['id' => $arNews[0]->id]) }}" class="news-card">
                    @if($arNews[0]->news_image)
                    <img src="{{ Storage::url($arNews[0]->news_image) }}" alt="{{ $arNews[0]->title }}">
                    @endif
                    <div class="card-layout">
                        <time class="news-date">{{ $arNews[0]->pub_date->format('d.m.Y') }}</time>
                        <div class="news-title">
                            {{ $arNews[0]->title }}
                        </div>
                    </div>
                </a>
            </div>
            @php $arNews->forget(0); @endphp

            <div class="news__list">
                @if (count($arNews) > 0)
                    @foreach ($arNews as $news)
                    <a href="{{ route('news_detail', ['id' => $news->id]) }}" class="news__item">
                        <time class="news-date">{{ $news->pub_date->format('d.m.Y') }}</time>
                        <div class="news-title">{{ $news->title }}</div>
                    </a>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="section-button">
            <a href="{{ route('news') }}" class="btn">Все новости</a>
        </div>
    </div>
</section>
@endif
