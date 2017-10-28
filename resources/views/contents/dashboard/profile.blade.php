@extends('layouts.main')

@section('pageTitle', 'iPin - Profile')

@section('content')
<div class="wrapper-profile">
	<div class="container">
		<div class="row justify-content-md-center pt-5 mt-5">
			<div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 col-md-auto content-left">
                <section class="section pb-5">
				    <div class="row">
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