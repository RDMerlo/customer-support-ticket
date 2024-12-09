@extends('admin.layouts.index')

@section('content')
    <h1>{{ __('sections.support_ticket_record') }}</h1>

    @if (count($supportTicketRecords) > 0)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Дата заявки</th>
                <th scope="col">EMail</th>
                <th scope="col">Ктегория</th>
                <th scope="col">Статус</th>
                <th scope="col">Открыть</th>
{{--                <th scope="col">Удалить</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach ($supportTicketRecords as $item)
                <tr>
                    <td>{{ $item->created_at ?? '' }}</td>
                    <td>{{ $item->email ?? '' }}</td>
                    <td>{{ $item->categoryRecord->name ?? '' }}</td>
                    <td>{{ $item->processingStatuses->name ?? '' }}</td>
                    <td>
                        <a href="{{ route('admin.support_ticket_record.show', ['support_ticket_record' => $item]) }}" class="btn btn-sm btn-success">
                            Открыть
                        </a>
                    </td>
{{--                    <td>--}}
{{--                        <form method="post" action="{{ route('admin.city.destroy', ['city' => $item]) }}">--}}
{{--                            @csrf--}}
{{--                            @method('delete')--}}
{{--                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <p>Нет записей</p>
    @endif

{{--    <div class="card my-4">--}}
{{--        <div class="card-header text-bg-secondary h6">Новая запись</div>--}}
{{--        <div class="card-body">--}}
{{--            <form method="post" enctype="multipart/form-data" action="{{ route('admin.city.store') }}">--}}
{{--                @csrf--}}

{{--                <div class="mb-3">--}}
{{--                    <label class="form-label">Название</label>--}}
{{--                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>--}}
{{--                </div>--}}

{{--                <button type="submit" class="btn btn-primary px-4 mt-2">Добавить</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
