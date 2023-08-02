@extends('admin.auth.master')
@section('page_title', 'Password reset')
@section('content')
    <div class="panel">
        <div class="panel-content">
            <div class="form-container" style="text-align: left;">
                <h1>Reset your password</h1>
                <form method="POST" action="{{route('admin.password.store')}}">
                    @csrf
                    <div class="control-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="required">Registered Email</label> 
                        <input type="email" id="email" name="email" value="{{$email}}" class="control">
                        @if ($errors->has('email'))
                            <span class="control-error">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <input type="hidden" id="email" name="token" value="{{$token}}" class="control">

                    <div class="control-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="required">Password</label> 
                        <input type="password" id="password" name="password" class="control">
                        @if ($errors->has('password'))
                            <span class="control-error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="control-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="password_confirmation" class="required">Password</label> 
                        <input type="password" id="password_confirmation" name="password_confirmation" class="control">
                        @if ($errors->has('password_confirmation'))
                            <span class="control-error">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                    <div class="button-group">
                        <button class="btn btn-xl btn-primary">Send Password Reset Email</button>
                    </div>
                </form>
                <div class="control-group" style="margin-bottom: 0px;">
                    <a href="{{route('admin.show.login')}}">
                        <i class="icon primary-back-icon" style="vertical-align: bottom;"></i>
                        Back to Sign In
                    </a>
                </div>    
            </div>
        </div>
    </div>
@endsection
