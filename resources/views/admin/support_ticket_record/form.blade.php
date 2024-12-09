@extends('admin.layouts.index')

@section('content')
<h1>Редактировать</h1>

<div class="card my-4">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.city.update', ['city' => $city]) }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $city->name ?? '' }}">
            </div>

            <button type="submit" class="btn btn-primary px-4 mt-2">Сохранить</button>
        </form>
    </div>
</div>

@endsection
