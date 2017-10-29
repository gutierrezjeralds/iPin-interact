@extends('layouts.main')

@section('pageTitle', 'iPin - 404 Page Not found')

@section('styles')
<link href="{{ asset('css/error.css') }}" rel="stylesheet">
@endsection

@section('navbarClassName', 'navbar-bg')

@section('content')
    <div class="wrapper-404">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    Sorry, the page you are looking for could not be found.
                </div>
            </div>
        </div>
    </div>
@endsection