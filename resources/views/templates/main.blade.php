<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title-web')
    </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @yield('css-addon')
    <link rel="icon" href="https://alan.co.id/wp-content/uploads/2023/03/Frame-482431-5.png" type="image/x-icon">
</head>

<body>
    <div class="preloader-wrapper" id="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading....</span>
        </div>
    </div>
    <div class="bg-light">
        @include('templates.header')
        <div class="wrapper">
            @yield('content')
        </div>
        @include('templates.footer')
    </div>

    @yield('js-addon')
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Session Alert --}}
    @if(Session::has('toast_success'))
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ Session::get('toast_success') }}",
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        position: 'top-end',
        toast: true
    });
    </script>
    @endif
    @if(Session::has('toast_error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ Session::get('toast_error') }}",
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            position: 'top-end',
            toast: true
        });
    </script>
    @endif
</body>

</html>
