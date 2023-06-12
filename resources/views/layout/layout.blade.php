<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/map.css">
    <link rel="stylesheet" href="/css/ranking.css">
    <title>@yield('title')</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <div class="main_content">
        @yield('content')
    </div>
</body>

</html>
