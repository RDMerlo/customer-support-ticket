@extends('admin.layouts.index')

@section('content')
<h1>Просмотр</h1>

<div class="card my-4">
    <div class="card-body">
{{--        <form method="post" enctype="multipart/form-data" action="{{ route('admin.city.update', ['city' => $city]) }}">--}}
{{--            @csrf--}}
{{--            @method('put')--}}

        <div class="mb-3">
            <label class="form-label">Дата запроса</label>
            <input type="text" class="form-control" name="created_at" value="{{ $supportTicketRecord->created_at ?? '' }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">ФИО</label>
            <input type="text" class="form-control" name="fullName" value="{{ $supportTicketRecord->fullName ?? '' }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">EMail</label>
            <input type="email" class="form-control" name="email" value="{{ $supportTicketRecord->email ?? '' }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Категория</label>
            <input type="text" class="form-control" name="categoryRecord" value="{{ $supportTicketRecord->categoryRecord->name ?? '' }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Статус</label>
            <input type="text" class="form-control" name="processingStatus" value="{{ $supportTicketRecord->processingStatuses->name ?? '' }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Сообщение</label>
            <textarea class="form-control" name="message" cols="30" rows="7" readonly>
                {!! $supportTicketRecord->message !!}
            </textarea>
        </div>


{{--            <button type="submit" class="btn btn-primary px-4 mt-2">Сохранить</button>--}}
{{--        </form>--}}
    </div>
</div>

@endsection
