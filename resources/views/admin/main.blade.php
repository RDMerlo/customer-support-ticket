@extends('admin.layouts.index')

@section('content')

        <h1>Главная</h1>

        <div class="card my-4">
            <div class="card-header text-bg-secondary h6"></div>
            <div class="card-body" style="min-height: 500px">
                <label style="">Текущий пользователь: {{$user->email}}</label>
                <br>
                <label style="">Роли пользователя: </label>
                @foreach ($user->roles as $roles)
                    {{$roles->name}};
                @endforeach
            </div>
        </div>

@endsection
