@props(['arItems' => []])

@foreach($arItems as $arItem)
    <div class="features__item">
        <figure class="feature">
            <div class="digit">{{ $arItem['num'] }}</div>
            <figcaption class="digit-caption">{{ $arItem['text'] }}</figcaption>
        </figure>
    </div>
@endforeach
