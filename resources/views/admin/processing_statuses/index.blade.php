@extends('admin.layouts.index')

@section('content')
    <h1>{{ __('sections.processing_statuses') }}</h1>

    @if (count($processingStatuses) > 0)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Slug</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($processingStatuses as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td><a href="{{ route('admin.processing_statuses.edit', ['processing_status' => $item]) }}" class="btn btn-sm btn-success">Редактировать</a></td>
                    <td>
                        <form method="post" action="{{ route('admin.processing_statuses.destroy', ['processing_status' => $item]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <p>Нет записей</p>
    @endif

    <div class="card my-4">
        <div class="card-header text-bg-secondary h6">Новая запись</div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('admin.processing_statuses.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Название</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" required>
                </div>

                <button type="submit" class="btn btn-primary px-4 mt-2">Добавить</button>
            </form>
        </div>
    </div>

@endsection
