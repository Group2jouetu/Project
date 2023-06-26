<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/bottomNav.css">
    <link rel="stylesheet" href="/css/header.css">
    <!-- ↓固有のCSSはsectionとyieldで記述してください。 -->
    @yield('add_css')
    
    <title>@yield('title')</title>
    {{-- bootstrap --}}
    @vite('resources/sass/app.scss')
    @vite('resources/js/bootstrap.js')
</head>

<body>
    @include('header')
    
    <div class="main_content">
        @yield('content')
    </div>
    @include('bottomNav')
</body>

</html>
