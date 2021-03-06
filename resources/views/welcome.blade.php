<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <script type="module" src="{{mix('js/app.js')}}"  ></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <!-- Fonts -->

    </head>
    <body>
    <div id="app">
        <App/>
    </div>
    </body>
</html>
