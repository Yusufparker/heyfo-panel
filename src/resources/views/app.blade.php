<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="shortcut icon" href="{{asset('img/logo-health.png')}}" type="image/x-icon"> --}}
    <script src="https://kit.fontawesome.com/53c338f417.js" crossorigin="anonymous"></script>
    <title>Dashboard | HeyFo</title>
</head>
<body>
    <div id="app">
        <dashboard-layout   :auth="{{json_encode(Auth::user())}}">
        @yield('content')
        </dashboard-layout>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>