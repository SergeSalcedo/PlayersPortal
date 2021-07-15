<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Players Portal</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="https://freepngimg.com/download/gamepad/80652-all-pro-controller-xbox-controllers-switch-game.png">
</head>
<body>
    <div id="app" style="position: relative; min-height: 100vh;">
        @include('navinc.navbar')
        <br>
        <div class="container" style="padding-bottom: 2.5rem;">
            @include('navinc.messages')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
<!--
    <footer class="page-footer font-small blue" style="position: absolute; bottom: 0; width: 100%; height: 2.5rem;">
    
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
          <a href="https://www.ncirl.ie/"> Serge Salcedo | x16483684</a>
        </div>
    
    </footer>
-->
</body>
</html>
