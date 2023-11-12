<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- スタイルシートとJavaScriptの読み込み -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Font Awesomeの読み込み -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>EATravel Japan</title>
</head>
<body>
    <header id="header" class="d-flex flex-column justify-content-between">
        @include('layouts.partials.header')
    </header>

    <main>
        <div class="inner">
            @yield('content')
        </div>
    </main>

    <footer class="mt-5 pb-5">
        @include('layouts.partials.footer')
    </footer>
</body>
</html>
