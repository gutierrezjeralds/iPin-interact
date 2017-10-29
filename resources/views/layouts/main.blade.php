<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="{{ Request::is('login') || Request::is('register') || auth()->user() == null ? 'full-height' : '' }}">
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
    @yield('styles')

</head>
<body class="fixed-sn scrollbar-night-fade {{ Route::currentRouteName() == 'profile' ? 'white-skin' : '' }}" data-spy="scroll" data-target="#scrollspy" data-offset="15">

    <!-- Pre loader -->
    <!-- <div id="mdb-preloader" class="flex-center white">
        <div id="preloader-markup">
            <div class="preloader-wrapper medium active">
                <div class="spinner-layer spinner-green-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                        </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END Pre loader -->

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
            @if( Request::is('login') || Request::is('register') )
                @include('contents.header_footer.footer')
            @endif
        </div>
    </footer>

    <div class="wrapper-modals">
        @include('contents.extras.modal')

        @yield('modals')
    </div>

    <!-- Scripts -->
    @include('contents.extras.global_scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/compiled.min.js') }}"></script>
    <script src="{{ asset('js/ipin-compiled.js') }}"></script>
    @include('contents.extras.alerts')
    
</body>
</html>
