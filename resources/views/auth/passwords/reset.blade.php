@extends('layouts.main')

@section('pageTitle', 'iPin - Reset Password')

@section('navbar-className', 'navbar-bg')
@section('footer-className', 'd-none')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center pt-5 mt-5">
            <div class="col-md-6 col-xl-5 offset-xl-1">
                <div class="card wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="black-text"><i class="fa fa-window-restore black-text"></i> Reset Password</h3>
                            <hr class="hr-dark">
                        </div>
                        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
                                <i class="fa fa-envelope prefix black-text"></i>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                                <label for="form2">Email Address</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="md-form {{ $errors->has('password') ? 'has-error' : '' }}">
                                <i class="fa fa-lock prefix black-text"></i>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label for="form4">Password</label>
                                <div class="checkbox font-small grey-text d-flex justify-content-end">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="md-form {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <i class="fa fa-lock prefix black-text"></i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="form4">Confirm Password</label>
                                <div class="checkbox font-small grey-text d-flex justify-content-end">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

