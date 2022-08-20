@extends('admin.admin')
@section('content')
<section class="content-header">
    <h1>Edit Donation Box</h1>
</section>
<section class="content">
    <div class="box box-warning">.
        <div class="box-header">
        </div>
        {!! Form::model($donationBox, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\DonateBoxController@update', $donationBox->id]]) !!}
        <div class="form-group col-md-6">
            {!! Form::label('name', 'Name:') !!}
            <small class="error">{{ $errors->first('name') }}</small>
            {!! Form::text('name', null, ['class' => 'form-control', 'data-parsley-length'=>"[2, 50]" , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('location', 'Location:') !!}
            <small class="error">{{ $errors->first('location') }}</small>
            {!! Form::text('location', null, ['class' => 'form-control', 'data-parsley-length'=>"[2, 100]" , 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('user_id', 'Responsible Person For Donation Box:') !!}
            <small class="error">{{ $errors->first('user_id') }}</small>
            {!! Form::select('user_id', ['' => 'Select the Responsible Person'] + $users , null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('status', 'Status:') !!}
            <small class="error">{{ $errors->first('status') }}</small>
            {!! Form::select('status', [1 => 'Active', 0 => 'Not Active'], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-12">
            {!! Form::label('description', 'Description:') !!}
            <small class="error">{{ $errors->first('description') }}</small>
            {!! Form::text('description', null, ['class' => 'form-control', 'id' => 'description', 'data-parsley-length'=>"[2, 250]" , 'required']) !!}
        </div>
        <div class="form-group col-md-12">
            {!! Form::submit('Save', ['class' => 'btn btn-warning col-md-12']) !!}
        </div>
        <div class="box-footer">
        </div>
        {!! Form::close() !!}
    </div>
    <div>

    </div>
    </div>
</section>

@endsection

@section('script')
<script>
    $('form').parsley();
</script>
@endsection
