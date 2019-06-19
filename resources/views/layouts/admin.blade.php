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
<body id="admin">
    <div class="container-fluid">
        <div class="row">
            @include('inc.adminNav')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @include('inc.messages')

                @yield('content')
            </main>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>