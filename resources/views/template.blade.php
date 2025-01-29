<!DOCTYPE html>
<html style="height: 100%" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('fontawesome\css\fontawesome.css') }}">
    <link rel="stylesheet" href="{{ url('fontawesome\css\solid.css') }}">
    <link rel="stylesheet" href="{{ url('fontawesome\css\brands.css') }}">
</head>

<body class="d-flex flex-column" style="height: 100%">

    @include('partials.navbar')

    <div class="container flex-grow-1">
        <div style="margin-top: 10px">
            @yield('content')
        </div>

    </div>

    @include('partials.footer')

    <script src="js\jquery-3.7.1.min.js"></script>
    <script src="js\bootstrap.bundle.js"></script>
</body>

</html>
