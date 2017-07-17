<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/master.css">
    <!-- Styles -->
    <!-- include libraries(jQuery, bootstrap) -->
<body>

<div id="app">
    <header>
        @include('components.navbar')
    </header>
    @yield('content')
    <footer>

    </footer>
</div>
@yield('script')
<script src="/js/app.js"></script>
</body>
</html>
