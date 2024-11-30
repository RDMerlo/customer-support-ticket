<ul class="navbar-nav">
@foreach($items as $item)
    <li class="nav-item">
        <a class="nav-link @if(!empty($item['check_active']) && Request::is($item['check_active'])) active @endif"
           href="@if($item['code']){{ route($item['code'], $item['params']) }}@endif">
            {{ $item['title'] }}
        </a>
    </li>
@endforeach
</ul>
