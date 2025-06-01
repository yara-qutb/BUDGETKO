@if(session()->has("errors"))
    @foreach ($errors as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
