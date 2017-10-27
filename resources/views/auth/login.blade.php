@extends('layouts.main')

@section('pageTitle', 'iPin - Signin/Signup')

@section('signin_signup')
<section class="wrapper-signin-signup view hm-gradient">
    <div class="full-bg-img">
        <div class="container flex-center">
            <div id="signinForm" class="d-flex align-items-center content-height">
                <div class="row flex-center pt-5 mt-3">
                    <div class="col-md-6 text-center text-md-left mb-5">
                        <div class="white-text">
                            <h1 class="h1-responsive font-bold wow fadeInLeft" data-wow-delay="0.3s">Sign in for better experience!</h1>
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
                                    <h3 class="white-text"><i class="fa fa-sign-in white-text"></i> Log in</h3>
                                    <hr class="hr-light">
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="md-form {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <i class="fa fa-envelope prefix white-text"></i>
                                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                                        <label for="form2">Email Address</label>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="md-form {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <i class="fa fa-lock prefix white-text"></i>
                                        <input type="password" name="password" class="form-control" required>
                                        <label for="form4">Password</label>
                                        <div class="checkbox font-small grey-text d-flex justify-content-end">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="md-form">
                                        <div class="form-group">
                                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember">Remember Me</label>
                                        </div>
                                        <p class="font-small grey-text d-flex justify-content-end">Forgot <a href="{{ route('password.request') }}" class="dark-grey-text font-bold ml-1"> Password?</a></p>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-indigo">Sign in</button>
                                    </div>
                                </form>
                                <hr class="hr-light mb-3 mt-2">
                                <div class="text-center">
                                    <div class="inline-ul text-center d-flex justify-content-center">
                                    <h5 class="white-text"><i class="fa fa-user white-text"></i> Don't have an account? <a href="{{ route('register') }}" class="font-weight-bold signup-form">Sign up</a></h5>
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