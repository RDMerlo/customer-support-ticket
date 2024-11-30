@if(session()->has('success'))
    <x-general.alert type="success" :message="session()->get('success')"/>
@endif

@if(session()->has('error'))
    <x-general.alert type="danger" :message="session()->get('error')"/>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
