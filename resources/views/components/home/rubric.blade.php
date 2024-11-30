@props(['arItems' => []])

@foreach($arItems as $arItem)
@php
    $route = route($arItem['route'], $arItem['params']);
@endphp
    <div class="rubric__item">
        <a href="{{ $route }}" class="rubric-card">
            <img src="{{ asset($arItem['image']) }}" alt="">
            <div class="card-body">
                <div class="card-title">
                    {{ __('sections.'. $arItem['name']) }}
                </div>
            </div>
        </a>
    </div>
@endforeach
