@extends('admin.admin')

@section('content')
    <section class="content-header">
        <h1>Edit member info</h1>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
            </div>

            {!! Form::model($member, ['method' => 'PATCH', 'action' =>[['App\Http\Controllers\FamilyMemberController@update'], $member->id], 'files' => true]) !!}
            

            <div class="form-group col-md-4">
                {!! Form::label('first_name', 'First Name:') !!}
                <small class="error">{{ $errors->first('first_name') }}</small>
                {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name', 'data-parsley-length'=>"[3, 50]" , 'required']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('last_name', 'Last Name:') !!}
                <small class="error">{{ $errors->first('last_name') }}</small>
                {!! Form::text('last_name', null, ['class' => 'form-control', 'data-parsley-length'=>"[3, 50]" , 'required']) !!}
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
                {!! Form::label('job', 'Job:') !!}
                <small class="error">{{ $errors->first('job') }}</small>
                {!! Form::text('job', null, ['class' => 'form-control', 'data-parsley-length' => '[3, 50]']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('date_birth', 'Date Birth:') !!}
                <small class="error">{{ $errors->first('date_birth') }}</small>
                {!! Form::date('date_birth', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-4">
                {!! Form::label('gender', 'Gender:') !!}
                <small class="error">{{ $errors->first('gender') }}</small>
                {!! Form::select('gender', ['' => 'Select The Gender', 0 => 'Male', 1 => 'Female'], null, ['class' => 'form-control']) !!}
            </div>
            <input type="hidden" name="needy_people_id" id="needy_people_id" value="{{ $member->needy_people_id }}">
            <div class="form-group col-md-4">
                {!! Form::label('relationship_id', 'Relationship Type:') !!}
                <small class="error">{{ $errors->first('relationship_id') }}</small>
                {!! Form::select('relationship_id', ['' => 'Select The Relationship'] + App\Models\Relationship::pluck('name','id')->all(), null, ['class' =>
                'form-control']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('image', 'Image:') !!}
                <small class="error">{{ $errors->first('image') }}</small>
                {!! Form::file('image', null, ['class' => 'form-control ']) !!}
                <input type="hidden" class="form-control" name="old_image" id="old_image" value="{{ $member->image }}">
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('description', 'Description:') !!}
                <small class="error">{{ $errors->first('description') }}</small>
                {!! Form::text('description', null, ['class' => 'form-control', 'data-parsley-length' => '[3, 500]']) !!}
            </div>

            <div class="form-group col-md-12 col-sm-12">
                {!! Form::submit('Update', ['class' => 'btn btn-warning col-md-12', 'id' => 'save_family_member_btn'])
                !!}
            </div>
            <div class="box-footer">
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection

@section('script')
    <script>

    </script>
@endsection
