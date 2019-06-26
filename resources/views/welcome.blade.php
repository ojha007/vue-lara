<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vue-Lara</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/app.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">


</head>
<body>
<div id="app">
    <v-app>
        <Home/>
    </v-app>

</div>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production

    var pusher = new Pusher('9220cbdd5ffe6eeb0cae', {
        cluster: 'ap3',
        forceTLS: true
    });

    var channel = pusher.subscribe('status-liked');
    channel.bind('StatusLiked', function (data) {
        alert();
    });
</script>
</html>

