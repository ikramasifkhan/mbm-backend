@extends('admin.auth.master')

@section('page_title', 'Forget password')

@section('content')
    <div class="panel">
        <div class="panel-content">
            <div class="form-container" style="text-align: left;">
                <h1>Recover Password</h1>
                <form method="POST" action="{{route('admin.password.email')}}">
                    @csrf
                    <div class="control-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="required">Registered Email</label> 
                        <input type="email" id="email" name="email" value="{{old('email')}}" class="control">
                        @if ($errors->has('email'))
                            <span class="control-error">{{ $errors->first('email') }}</span>
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
