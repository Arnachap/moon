<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Moon') }} - @yield('title')</title>
    <link rel="icon" type="image/png" href="/img/logo/cat.png" />
    
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('inc.mainNav')

    @yield('content')
    
    @include('inc.footer')

    <script src="/js/app.js"></script>
</body>
</html>