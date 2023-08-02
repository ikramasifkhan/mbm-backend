@extends('admin.layout.master')

@section('title', 'Staffs')

@section('content')
    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <a href="{{ route('admin.staffs.index') }}"><i class="icon angle-left-icon back-link"></i></a>
                    Staffs
                </h1>
            </div>
        </div>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif
        <div class="page-content">
            <form action="{{ route('admin.staffs.store') }}" method="POST">
                <div class="form-container">
                    <div slot="body">
                        @csrf
                        <div class="control-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label for="first_name" class="required"> First Name</label>
                            <input type="text" placeholder="First name" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                class="control">
                            @if ($errors->has('first_name'))
                                <span class="control-error">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label for="last_name" class="required"> Last Name</label>
                            <input type="text" placeholder="Last name" id="last_name" name="last_name" value="{{ old('last_name') }}" class="control">
                            @if ($errors->has('last_name'))
                                <span class="control-error">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="required"> Email</label>
                            <input type="email" placeholder="Email address" id="email" name="email" value="{{ old('email') }}" class="control">
                            
                            @if ($errors->has('email'))
                                <span class="control-error">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <label for="mobile" class="required"> Mobile</label>
                            <input type="mobile" placeholder="Mobile number" id="mobile" name="mobile" value="{{ old('mobile') }}" class="control">

                            @if ($errors->has('mobile'))
                                <span class="control-error">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                            <label for="date_of_birth" class="required"> Birth date</label>
                            <input type="date" placeholder="Birth date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" class="control flatpickr-input ">

                            @if ($errors->has('date_of_birth'))
                                <span class="control-error">{{ $errors->first('date_of_birth') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('residensial_address') ? 'has-error' : '' }}">
                            <label for="residensial_address" class="required"> Address</label>
                            <input type="text" placeholder="Type address" id="residensial_address" name="residensial_address" value="{{ old('residensial_address') }}" class="control">
                            
                            @if ($errors->has('residensial_address'))
                                <span class="control-error">{{ $errors->first('residensial_address') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('residensial_address') ? 'has-error' : '' }}">
                            <label for="password" class="required"> Password</label>
                            <input type="password" placeholder="Enter password" id="password" name="password" class="control">
                            
                            @if ($errors->has('password'))
                                <span class="control-error">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('residensial_address') ? 'has-error' : '' }}">
                            <label for="password_confirmation" class="required"> Re-type password</label>
                            <input type="password" placeholder="Re-enter password" id="password_confirmation" name="password_confirmation" class="control">
                            
                            @if ($errors->has('password_confirmation'))
                                <span class="control-error">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Save staff</button>
                </div>
            </form>
        </div>
    </div>

@endsection
