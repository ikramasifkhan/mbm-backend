<div class="page-content">
    <form action="{{ route('admin.password.update') }}" method="POST">
        <div class="form-container">
            <div slot="body">
                @csrf
                <div class="control-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
                    <label for="current_password" class="required"> Current password</label>
                    <input type="password" id="current_password" name="current_password" value=""
                        class="control">
                    
                    @if ($errors->has('current_password'))
                        <span class="control-error">{{ $errors->first('current_password') }}</span>
                    @endif
                </div>

                <div class="control-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                    <label for="new_password" class="required"> New password</label>
                    <input type="password" id="new_password" name="new_password" value=""
                        class="control">
                    
                    @if ($errors->has('new_password'))
                        <span class="control-error">{{ $errors->first('new_password') }}</span>
                    @endif
                </div>

                <div class="control-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                    <label for="new_password_confirmation" class="required"> Retype new password</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" value=""
                        class="control">
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Change your password now</button>
        </div>
    </form>
</div>