@extends('layouts.main')

@section('pageTitle', 'iPin - Signin/Signup')

@section('html-className', 'full-height')

@section('signin_signup')
<section class="wrapper-signin-signup view hm-gradient">
    <div class="full-bg-img">
        <div class="container flex-center">
            <div id="signupForm" class="d-flex align-items-center content-height">
                <div class="row flex-center pt-5 mt-3">
                    <div class="col-md-6 text-center text-md-left mb-5">
                        <div class="white-text">
                            <h1 class="h1-responsive font-bold wow fadeInLeft" data-wow-delay="0.3s">Sign up for free! </h1>
                            <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                            <h6 class="wow fadeInLeft" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae, quisquam iste, maiores. Nulla.</h6>
                            <br>
                            <a class="btn btn-outline-white wow fadeInLeft" data-wow-delay="0.3s">Learn more</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-5 offset-xl-1">
                        <div class="card wow fadeInRight" data-wow-delay="0.3s">
                            <div class="card-body">
                                <div class="text-center">
                                    <h3 class="white-text"><i class="fa fa-user white-text"></i> Register</h3>
                                    <hr class="hr-light">
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <div class="md-form {{ $errors->has('fullname') ? 'has-error' : '' }}">
                                        <i class="fa fa-user prefix white-text"></i>
                                        <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}" autocomplete="off" required>
                                        <label for="form3">Full Name</label>
                                        @if ($errors->has('fullname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fullname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="md-form {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <i class="fa fa-envelope prefix white-text"></i>
                                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" autocomplete="off" required>
                                        <label for="form2">Email Address</label>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="md-form {{ $errors->has('username') ? 'has-error' : '' }}">
                                        <i class="fa fa-user prefix white-text"></i>
                                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" autocomplete="off" required>
                                        <label for="form2">Username</label>
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="md-form {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <i class="fa fa-lock prefix white-text"></i>
                                        <input type="password" name="password" class="form-control" autocomplete="off" required>
                                        <label for="form4">Password</label>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-cus-submit">Sign up</button>
                                    </div>
                                </form>
                                <hr class="hr-light mb-3 mt-2">
                                <div class="text-center">
                                    <div class="inline-ul text-center d-flex justify-content-center">
                                    <h5 class="white-text"><i class="fa fa-sign-in white-text"></i> Already have an account? <a href="{{ route('login') }}" class="font-weight-bold signin-form">Log in</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection