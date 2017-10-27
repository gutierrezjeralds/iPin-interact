<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="{{ \Request::is('login') || \Request::is('register') || auth()->user() == null ? 'full-height' : '' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle')</title>

    <!-- Styles -->
    <link href="{{ asset('css/compiled.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ipin-compiled.css') }}" rel="stylesheet">

</head>
<body class="fixed-sn" data-spy="scroll" data-target="#scrollspy" data-offset="15">

    <header>
        <div class="wrapper-header">
            @include('contents.header_footer.header')
        </div>

        @yield('signin_signup')
    </header>

    <content id="ipin-app">
        <div class="wrapper-content">
            @yield('content')
        </div>
    </content>

    <footer>
        <div class="wrapper-footer">
            @include('contents.header_footer.footer')
        </div>
    </footer>

    <!-- Scripts -->
    @include('contents.includes.global_scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/compiled.min.js') }}"></script>
    <script src="{{ asset('js/ipin-compiled.js') }}"></script>
    
</body>
</html>
