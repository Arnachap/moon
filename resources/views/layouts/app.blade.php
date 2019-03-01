<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Moon') }}</title>
    
    <link rel="stylesheet" href="./css/app.css">
</head>
<body>
    @include('layouts.mainNav')

    @yield('content')
</body>
</html>