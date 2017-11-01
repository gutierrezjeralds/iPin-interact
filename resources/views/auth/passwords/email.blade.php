@extends('layouts.main')

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
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
                            <i class="fa fa-envelope prefix black-text"></i>
                            <input type="text" name="email" class="form-control black-text" value="{{ old('email') }}" required>
                            <label for="form2">Email Address</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
