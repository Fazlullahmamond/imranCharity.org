@extends('admin.admin')

@section('content')
    <section class="content-header">
        <h1>Add Staff</h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'user.store', 'files' => true, 'id' => 'form']) !!}
            @csrf
            <div class="form-group col-md-6">
                {!! Form::label('first_name', 'First Name:') !!}
                <small class="error">{{ $errors->first('first_name') }}</small>
                {!! Form::text('first_name', null, ['class' => 'form-control', 'data-parsley-length' => '[2, 50]', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('last_name', 'Last Name:') !!}
                <small class="error">{{ $errors->first('last_name') }}</small>
                {!! Form::text('last_name', null, ['class' => 'form-control', 'data-parsley-length' => '[2, 50]', 'required']) !!}
            </div>
            {{-- <div class="form-group col-md-6">
                {!! Form::label('email', 'E-Mail Address:') !!}
                <small class="error">{{ $errors->first('email') }}</small>
                {!! Form::email('email', null, ['class' => 'form-control', 'data-parsley-type'=>"email", 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('password', 'Password') !!}
                <small class="error">{{ $errors->first('password') }}</small>
                {!! Form::password('password', ['class' => 'form-control', 'data-parsley-maxlength'=>"40", 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('confirm', 'Confirm Password') !!}
                <small class="error">{{ $errors->first('password') }}</small>
                {!! Form::password('confirm_password', ['class' => 'form-control',"data-parsley-equalto"=>"#password", 'required']) !!}
            </div> --}}
            <div class="form-group col-md-6">
                {!! Form::label('phone_number', 'Phone Number:') !!}
                <small class="error">{{ $errors->first('phone_number') }}</small>
                {!! Form::text('phone_number', null, ['class' => 'form-control', 'data-parsley-pattern-message ' => 'Must Start With +9xx , 0093, 07, 7', 'data-parsley-maxlength' => '20', 'data-parsley-pattern' => '/(\+93|0093)?0?7[0-9]{8}/']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('hometown', 'Hometown Address:') !!}
                <small class="error">{{ $errors->first('hometown') }}</small>
                {!! Form::text('hometown', null, ['class' => 'form-control', 'data-parsley-length' => '[2, 200]']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('current_address', 'Current Address:') !!}
                <small class="error">{{ $errors->first('current_address') }}</small>
                {!! Form::text('current_address', null, ['class' => 'form-control', 'data-parsley-length' => '[2, 200]']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('gender', 'Gender:') !!}
                <small class="error">{{ $errors->first('gender') }}</small>
                {!! Form::select('gender', [0 => 'Male', 1 => 'Female'], null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('role', 'Position:') !!}
                <small class="error">{{ $errors->first('role') }}</small>
                {!! Form::select('role_id', ['' => 'Selcet the Poition'] + $roles, null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('status', 'Status:') !!}
                <small class="error">{{ $errors->first('status') }}</small>
                {!! Form::select('status', [1 => 'Active', 0 => 'Not Active'], 1, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('date_birth', 'Date Birth:') !!}
                <small class="error">{{ $errors->first('date_birth') }}</small>
                {!! Form::date('date_birth', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('description', 'Description:') !!}
                <small class="error">{{ $errors->first('description') }}</small>
                {!! Form::text('description', null, ['class' => 'form-control', 'rows' => '6']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('image', 'Image:') !!}
                <small class="error">{{ $errors->first('image') }}</small>
                {!! Form::file('image', ['class' => 'form-control']) !!}
                <input type="hidden" class="form-control" name="old_image" id="old_image"
                    value="backend/img/users/user.jpg">

            </div>
            {{-- <div class="form-group col-md-12">
                {!! Form::date('email_verified_at') !!}
                <small class="error">{{ $errors->first('email_verified_at') }}</small>
                {!! Form::label('email_verified_at', 'Email Verified: ') !!}

            </div>
            <div class="form-group col-md-12">
                {!! Form::date('phone_verified_at' ) !!}
                <small class="error">{{ $errors->first('phone_verified_at') }}</small>
                {!! Form::label('phone_verified_at', 'Phone Verified:') !!}
            </div> --}}
            <div class="form-group col-md-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary col-md-12']) !!}
            </div>
            <div class="box-footer">
            </div>
            {!! Form::close() !!}
        </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $('#form').parsley();

    </script>
@endsection
