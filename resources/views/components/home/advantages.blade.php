@props(['arItems' => []])

@foreach($arItems as $arItem)
    <div class="advantages__item">
        <div class="advantage-icon">
            <svg class="svg-icon">
                <use xlink:href="/assets/img/sprite.svg#{{ $arItem['icon'] }}"></use>
            </svg>
        </div>
        <div class="advantage-caption">
            {{ $arItem['text'] }}
        </div>
    </div>
@endforeach
