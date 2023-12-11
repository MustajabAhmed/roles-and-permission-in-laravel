@if($errors->any())
    <span class="error-message-span ps-3 w-100">
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </span>
@endif
@if(Session::has('success'))
    <span class="success-message-span ps-3 w-100">
        {{ Session::get('success') }}
    </span>
@endif