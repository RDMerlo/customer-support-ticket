@if (count($arArticles) > 0)
<section class="articles">
    <h2 class="section-title">{{ __('sections.articles') }}</h2>

    <div class="articles__row">
        @foreach ($arArticles as $article)
        <div class="articles__item">
            <a href="{{ route('universal_section_detail', ['name' => 'articles', 'id' => $article->id]) }}" class="card">
                <div class="card-image">
                    @if($article->articles_image)
                    <img src="{{ Storage::url($article->articles_image) }}" alt="{{ $article->title }}">
                    @endif
                </div>
                <div class="card-body">
                    <time class="card-date">{{ $article->pub_date->format('d.m.Y') }}</time>
                    <div class="card-title">{{ $article->title }}</div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="section-button">
        <a href="{{ route('universal_section', ['name' => 'articles']) }}" class="btn">Все статьи</a>
    </div>
</section>
@endif
