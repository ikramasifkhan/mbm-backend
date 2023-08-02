@extends('admin.layout.master')

@section('title', 'Staffs')

@section('content')
    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <a href="{{ route('admin.staffs.index') }}"><i class="icon angle-left-icon back-link"></i></a>
                    {{ $staff->first_name }} {{ $staff->last_name }}
                </h1>
            </div>
        </div>

        <div class="page-content">
            <form action="{{ route('admin.staffs.update', $staff->id) }}" method="POST">
                <div class="form-container">
                    <div slot="body">
                        @csrf
                        @method('PUT')
                        <div class="control-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label for="first_name" class="required"> First Name</label>
                            <input type="text" id="first_name" name="first_name" value="{{ $staff->first_name }}"
                                class="control">
                            <input type="hidden" id="id" name="id" value="{{ $staff->id }}">
                            @if ($errors->has('first_name'))
                                <span class="control-error">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label for="last_name" class="required"> Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ $staff->last_name }}"
                                class="control">
                            @if ($errors->has('last_name'))
                                <span class="control-error">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="required"> Email</label>
                            <input type="email" id="email" name="email" value="{{ $staff->email }}"
                                class="control">
                            
                            @if ($errors->has('email'))
                                <span class="control-error">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <label for="mobile" class="required"> Mobile</label>
                            <input type="mobile" id="mobile" name="mobile" value="{{ $staff->mobile }}"
                                class="control">

                            @if ($errors->has('mobile'))
                                <span class="control-error">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                            <label for="date_of_birth" class="required"> Birth date</label>
                            <input type="date" id="date_of_birth" name="date_of_birth"
                                value="{{ $staff->date_of_birth }}" class="control flatpickr-input ">

                            @if ($errors->has('date_of_birth'))
                                <span class="control-error">{{ $errors->first('date_of_birth') }}</span>
                            @endif
                        </div>

                        <div class="control-group {{ $errors->has('residensial_address') ? 'has-error' : '' }}">
                            <label for="residensial_address" class="required"> Address</label>
                            <input type="text" id="residensial_address" name="residensial_address"
                                value="{{ $staff->residensial_address }}" class="control">
                            
                            @if ($errors->has('residensial_address'))
                                <span class="control-error">{{ $errors->first('residensial_address') }}</span>
                            @endif
                        </div>


                        <div class="control-group {{ $errors->has('residensial_address') ? 'has-error' : '' }}">
                            <label for="gender" class="required">Status</label>
                            <select id="gender" name="status" class="control">
                                <option value="active" {{ $staff->status === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $staff->status === 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="control-error">{{ $errors->first('status') }}</span>
                            @endif
                        </div>

                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Save staff</button>
                </div>
            </form>
        </div>
    </div>

@endsection
