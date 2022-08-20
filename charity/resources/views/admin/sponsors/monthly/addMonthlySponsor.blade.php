@extends('admin.admin')

@section('content')
    <section class="content-header">
        <h1>Add Sponsor</h1>
    </section>
    <section class="content">
        <div class="box box-warning">
        <div class="box-header">
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\MonthlySponsorsController@store', 'id' =>'form']) !!}
        
        <div class="form-group col-md-6">
            {!! Form::label('user_id', 'Donator Name:') !!}
            @error('user_id')
            <small class="error">{{ $message }}</small>
            @enderror
            {!! Form::select('user_id', ['' => 'Select The Donator'] + $donator, null, ['class' =>
            'form-control', 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('needy_people_id', 'Donate To:') !!}
            @error('needy_people_id')
            <small class="error">{{ $message }}</small>
            @enderror
            {!! Form::select('needy_people_id', ['' => 'Select The Needy Person'] + $needy_people, null, ['class' =>
            'form-control', 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('monthly_amount', 'Monthly Amount:') !!}
            <small class="error">{{ $errors->first('monthly_amount') }}</small>
            {!! Form::text('monthly_amount', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('duration', 'Duration:') !!}
            <small class="error">{{ $errors->first('duration') }}</small>
            {!! Form::date('duration', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group col-md-12">
            {!! Form::label('description', 'Description:') !!}
            <small class="error">{{ $errors->first('description') }}</small>
            {!! Form::textarea('description', null, ['class' => 'form-control', 'data-parsley-length' => '[2,500]']) !!}
        </div>

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