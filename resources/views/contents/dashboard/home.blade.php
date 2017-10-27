@extends('layouts.main')

@section('content')
<div class="wrapper-home">
	<div class="container">
		<div class="row justify-content-md-center pt-5 mt-5">
			<div class="col-xl-10 col-md-10 col-sm-10 col-lg-10 col-md-auto content-left">
                <section class="section pb-5">
				    <div class="row">
				        @include('contents.dashboard.content.create')

				        @include('contents.dashboard.content.view')
				    </div>
				</section>
            </div>

            <div class="col-xl-2 col-md-2 col-sm-2 col-lg-2 col-md-auto content-right">
                
            </div>
		</div>
	</div>
</div>
@endsection