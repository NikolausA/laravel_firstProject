<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@section('title') Страница | @show</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@yield('menu')
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif

@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
