@extends('admin.auth.master')

@section('page_title', 'Login')

@section('content')
<div class="panel">

    <div class="panel-content">

        <div class="form-container" style="text-align: left">

            <h1>Login</h1>

            <form method="POST" action="{{route('admin.login')}}">
                @csrf
                <div class="control-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" class="control" id="email" name="email" placeholder="Your email" />
                    @if ($errors->has('email'))
                        <span class="control-error">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="control-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input type="password" class="control" id="password" placeholder="Your password" name="password" />

                    @if ($errors->has('password'))
                        <span class="control-error">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="control-group">
                    <a href="{{route('admin.password.request')}}">Forget password ? </a>
                </div>

                <div class="button-group">
                    <button class="btn btn-xl btn-primary">Login</button>
                </div>
            </form>

        </div>

    </div>

</div>
@endsection

@push('scripts')

<script>
    toastr.success(`Domain successfully`)
</script>
    
@endpush