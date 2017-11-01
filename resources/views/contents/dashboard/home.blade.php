@extends('layouts.main')

@section('pageTitle', 'iPin - Home')

@section('navbar-className', 'navbar-bg')

@if(Auth::guest())
	@section('html-className', 'full-height')
@endif

@section('footer-className', 'd-none')

@section('content')
<div class="wrapper-home">
	<div class="container">
		<div class="row justify-content-md-center pt-5 mt-5">
			<div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 col-md-auto content-left">
                <section class="section pb-5">
				    <div class="row" id="post-view">
				        @include('contents.dashboard.includes.create')

				        @include('contents.dashboard.includes.view')
				    </div>
				</section>
            </div>

            <!-- <div class="col-xl-2 col-md-2 col-sm-2 col-lg-2 col-md-auto content-right">
                
            </div> -->
		</div>
	</div>
</div>
@endsection