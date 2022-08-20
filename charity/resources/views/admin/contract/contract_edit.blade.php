@extends('admin.admin')

@section('content')
    <section class="content-header">
        <h1>Edit Contract</h1>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
            </div>
            {!! Form::model($contract, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\ContractController@update', $contract->id] ])!!}
                
            <div class="form-group col-md-12">
                {!! Form::label('contract_title', 'Contract Title:') !!}
                <small class="error">{{ $errors->first('contract_title') }}</small>
                {!! Form::text('contract_title', null, ['class' => 'form-control', 'required', "data-parsley-length" => '[3,200]']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('contract_with', 'Contract With:') !!}
                <small class="error">{{ $errors->first('contract_with') }}</small>
                {!! Form::text('contract_with', null, ['class' => 'form-control', 'required', "data-parsley-length" => '[3,200]']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('contract_startDate', 'Contract Start Date:') !!}
                <small class="error">{{ $errors->first('contract_startDate') }}</small>
                {!! Form::date('contract_startDate', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('contract_endDate', 'Contract End Date:') !!}
                <small class="error">{{ $errors->first('contract_endDate') }}</small>
                {!! Form::date('contract_endDate', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-12">
                <small class="error">{{ $errors->first('description') }}</small>
                {!! Form::textarea('description', null, ['class' => 'form-control', 'required', 'placeholder' => 'Description', "data-parsley-length" => '[3,500]']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::submit('Update', ['class' => 'btn btn-warning col-md-12']) !!}
            </div>
            <div class="box-footer">
            </div>

            {!! Form::close() !!}

        </div>
        </div>
    </section>

@endsection

@section('script')

@endsection
