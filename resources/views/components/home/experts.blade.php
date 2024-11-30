@if (count($arExperts) > 0)
<section class="experts">
    <div class="experts__layout">
        <div class="container">
            <h2 class="section-title">Эксперты</h2>

            <div id="carouselExperts" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($arExperts as $item)
                    <div class="carousel-item @if($loop->first)active @endif">
                        <div class="carousel-cell-expert">
                            <div class="expert-image">
                                <div class="image-wrap">
                                    @if($item->experts_opinions_image)
                                    <img src="{{ Storage::url($item->experts_opinions_image) }}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="expert-text">
                                <div class="expert-quote">
                                    {{ $item->announcement }}
                                </div>
                                <div class="expert-name">
                                    {!! $item->author !!}
                                </div>
                            </div>
                            <div class="expert-more">
                                <a href="{{ route('experts_opinions_detail', ['id' => $item->id]) }}" class="btn">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <x-general.carousel-control id="carouselExperts" />
            </div>
        </div>
    </div>
</section>
@endif
