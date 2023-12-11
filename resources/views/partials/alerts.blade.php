@if($errors->any())
    {{-- <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div> --}}
    <script>
        Swal.fire({
          title: "{{ __('Error!') }}",
          html: "@foreach($errors->all() as $error) {{ $error }} <br> @endforeach",
          icon: 'error',
          confirmButtonText: "{{ __('Confirm') }}"
        })
    </script>
@endif
@if(Session::has('success'))
    {{-- <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('success') }}
    </div> --}}

    <script>
        Swal.fire({
          title: "{{ __('Success!') }}",
          text: "{{ Session::get('success') }}",
          icon: 'success',
          confirmButtonText: "{{ __('Confirm') }}"
        })
    </script>
@endif
@if(Session::has('info'))
    <script>
        Swal.fire({
          title: "{{ __('Info') }}",
          text: "{{ Session::get('info') }}",
          icon: 'info',
          confirmButtonText: "{{ __('Confirm') }}"
        })
    </script>
@endif
@if(Session::has('warning'))
    <script>
        Swal.fire({
          title: "{{ __('Warning!') }}",
          text: "{{ Session::get('warning') }}",
          icon: 'warning',
          confirmButtonText: "{{ __('Confirm') }}"
        })
    </script>
@endif
@if(Session::has('danger'))
    <script>
        Swal.fire({
          title: "{{ __('Error!') }}",
          text: "{{ Session::get('danger') }}",
          icon: 'error',
          confirmButtonText: "{{ __('Confirm') }}"
        })
    </script>
@endif