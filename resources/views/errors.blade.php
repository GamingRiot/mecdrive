@if (session('error'))
    <div class="container mt-3 alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@foreach ($errors->all() as $error)
    <div class="container mt-3 alert alert-danger">
        {{ $error }}
    </div>
@endforeach
