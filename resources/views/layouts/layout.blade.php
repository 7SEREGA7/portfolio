<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@section('title')Portfolio | @show</title>
  <link rel="stylesheet" href="{{ asset('assets/front/css/front.css') }}">
</head>
<body>
@include('layouts.header')

<main class="main_container @if(Request::is('/')) home_container @endif">
  @yield('content')
</main>

@include('layouts.footer')

@yield('scripts')

<script src="{{ asset('assets/front/js/front.js') }}"></script>
</body>
</html>