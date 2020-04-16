@extends('layouts.app')

@section('title', 'SPMMaster - Login')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#">
            <b>
                SPP
            </b>
            Master
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">
            Sign in
        </p>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input class="form-control" name="username" placeholder="Username" type="text">
                    <span class="glyphicon glyphicon-user form-control-feedback">
                    </span>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                </input>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" name="password" placeholder="Password" type="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                    </span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                </input>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button class="btn btn-primary btn-block btn-flat" type="submit">
                        Sign In
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
@endsection
