<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
        <title>{{config('app.name', 'GameBlog')}}</title>
        </head>
    <body>
        @include('navinc.navbar')
        <div class="container">
            @include('navinc.messages')
            @yield('content')
        </div>
    </body>
</html>