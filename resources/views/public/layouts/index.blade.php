<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>M.Support</title>
    <link type="image/x-icon" href="{{asset('favicon.ico')}}" rel="shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset('css/public/theme.css')}}?v1.0" rel="stylesheet">
</head>
<body>
<div class="d-flex flex-column min-vh-100">
    @include('public.layouts.header')
    <input type="hidden" id="input_token" value="{{ csrf_token() }}">
    <main class="flex-grow-1 vh-75">
        @yield('content')
    </main>
    @include('public.layouts.footer')
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('js/public/custom.js')}}?v1.0"></script>
@stack('scripts')
</body>
</html>
