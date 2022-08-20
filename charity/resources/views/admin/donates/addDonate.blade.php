@extends('admin.admin')

@section('content')
    <section class="content-header">
        <h1>Add Donate</h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\DonateController@store', 'id' => 'form']) !!}
            <div class="form-group col-md-6">
                {!! Form::label('user_id', 'Donate By:') !!}
            <small class="error">{{ $errors->first('user_id') }}</small>
                {!! Form::select('user_id', [null => 'Selcet the Donator'] + $donators, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('donation_type', 'Donation Type:') !!}
            <small class="error">{{ $errors->first('donation_type_id') }}</small>

                {!! Form::select('donation_type_id', ['' => 'Selcet the Donation Type'] + $donation_types, null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-2 col-sm-6">
                {!! Form::label('currency', 'Currency:') !!}
            <small class="error">{{ $errors->first('currency') }}</small>
                {!! Form::select('currency', ['AF' => 'AF', 'USD' => 'USD', 'ERO' => 'ERO'], null, ['class' => 'form-control col-md-2', 'required']) !!}
            </div>
            <div class="form-group col-md-4">
                <small class="error">{{ $errors->first('donation_amount') }}</small>
                {!! Form::label('donation_amount', 'Donation Amount:') !!}
                {!! Form::number('donation_amount', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('donation_date', 'Donation Date') !!}
                <small class="error">{{ $errors->first('donation_date') }}</small>
                {!! Form::date('donation_date', date('Y-m-d'), ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('donation_delivery', 'Donation Delivery') !!}
                <small class="error">{{ $errors->first('donation_delivery') }}</small>
                {!! Form::date('donation_delivery', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('needy_people_id', 'Needy Person:') !!}
            <small class="error">{{ $errors->first('needy_people_id') }}</small>

                {!! Form::select('needy_people_id', ['' => 'Selcet the Needy Person'] + $needy_people, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('donation_location', 'Donation Location:') !!}
                <small class="error">{{ $errors->first('donation_location') }}</small>
                {!! Form::text('donation_location', null, ['class' => 'form-control', 'required', 'data-parsley-length'=>'[2,100]']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('donation_box', 'Donation Box:') !!}
                <small class="error">{{ $errors->first('donation_box_id') }}</small>
                {!! Form::select('donation_box_id', ['' => 'Selcet the Donation Box'] + $donation_boxes, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('description', 'Description:') !!}
                <small class="error">{{ $errors->first('description') }}</small>
                {!! Form::text('description', null, ['class' => 'form-control', 'data-parsley-length'=>'[2,500]', 'required']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary col-md-12']) !!}
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

