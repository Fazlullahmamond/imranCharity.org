@extends('admin.admin')

@section('content')
    <section class="content-header">
        <h1>Add Needy Perosn</h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'needy.store', 'files' => true, 'id' => 'form']) !!}
            <div class="form-group col-md-4">
                {!! Form::label('first_name', 'First Name:') !!}
                <small class="error">{{ $errors->first('first_name') }}</small>
                {!! Form::text('first_name', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 50]" , 'required']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('last_name', 'Last Name:') !!}
                <small class="error">{{ $errors->first('last_name') }}</small>
                {!! Form::text('last_name', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 50]" , 'required']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('fatherName', 'Father Name:') !!}
                <small class="error">{{ $errors->first('father_name') }}</small>
                {!! Form::text('father_name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('phone_number', 'Phone Number:') !!}
                <small class="error">{{ $errors->first('phone_number') }}</small>
                {!! Form::text('phone_number', null, ['class' => 'form-control' ,"data-parsley-pattern-message "=>"Must Start With +9xx , 0093, 07, 7" ,'data-parsley-maxlength' => '20' ,'data-parsley-pattern' => '/(\+93|0093)?0?7[0-9]{8}/']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('hometown', 'Hometown:') !!}
                <small class="error">{{ $errors->first('hometown') }}</small>
                {!! Form::text('hometown', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('current_address', 'Current Address:') !!}
                <small class="error">{{ $errors->first('current_address') }}</small>
                {!! Form::text('current_address', null, ['class' => 'form-control', 'data-parsley-length'=>"[3, 50]" , 'required']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('date_birth', 'Date Birth:') !!}
                <small class="error">{{ $errors->first('date_birth') }}</small>
                {!! Form::date('date_birth', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-4">
                {!! Form::label('gender', 'Gender:') !!}
                <small class="error">{{ $errors->first('gender') }}</small>
                {!! Form::select('gender', [0 => 'Male', 1 => 'Female'], null, ['class' =>
                'form-control', 'required']) !!}
            </div>

            <div class="form-group col-md-4">
                {!! Form::label('id_card_number', 'ID Card Number:') !!}
                <small class="error">{{ $errors->first('id_card_number') }}</small>
                {!! Form::number('id_card_number', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('needyPercentage', 'Needy Percentage:') !!}
                <small class="error">{{ $errors->first('needy_percentage') }}</small>
                {!! Form::number('needy_percentage', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 3]" , 'required']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('predictive_needs', 'Predictive Needs:') !!}
                <small class="error">{{ $errors->first('predictive_needs') }}</small>
                {!! Form::text('predictive_needs', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 20]" , 'required']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('person_type', 'Person Type:') !!}
                <small class="error">{{ $errors->first('person_type_id') }}</small>
                {!! Form::select('person_type_id', ['' => 'Select The User'] + $person_types, Auth::user()->id, ['class' =>
                'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('user_id', 'Register by:') !!}
                <small class="error">{{ $errors->first('user_id') }}</small>
                {!! Form::select('user_id', ['' => 'Select The User'] + $staff, Auth::user()->id, ['class' =>
                'form-control', 'required']) !!}
            </div>

            <div class="form-group col-md-12">
                {!! Form::label('description', 'Description:') !!}
                <small class="error">{{ $errors->first('description') }}</small>
                {!! Form::text('description', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group col-md-12">
                {!! Form::label('image', 'Image:') !!}
                <small class="error">{{ $errors->first('image') }}</small>
                {!! Form::file('image', null, ['class' => 'form-control ']) !!}
                <input type="hidden" class="form-control" name="old_image" id="old_image" value="backend/img/needy/needy.jpg">
            </div>

            <div class="form-group col-md-12 col-sm-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary pull-left col-md-12']) !!}
            </div>
            <div class="box-footer">
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection

@section('script')
<script>
    $('#form').parsley();
</script>
@endsection
