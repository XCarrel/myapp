<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="css/app.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap/bootstrap.js" type="text/javascript"></script>
    @yield('pagecss')
    @yield('pagejs')

</head>
<body>
@include('infomessage')
@yield('content')
</body>
</html>