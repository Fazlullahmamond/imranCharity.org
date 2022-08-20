@extends('admin.admin')

@section('content')
<section class="content">
<div class="row">

<div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header"></div>
            <div class="box-body">
                {!! Form::model($causes, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\CauseController@update', $causes->id],'class' => 'form-horizontal', 'id' => 'form']) !!}

                <div class="form-group">
                    <label for="cause_title" class="col-sm-2 control-label">Cause Title:</label>
                    <div class="col-sm-10">
                        <small class="error">{{ $errors->first('cause_title') }}</small>
                        {!! Form::text('cause_title', null, ['class' => 'form-control', 'data-parsley-length'=>"[3, 200]", 'required']) !!}
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="cause_goal" class="col-sm-2 control-label">Cause Goal (AFG):</label>
                    <div class="col-sm-10">
                        <small class="error">{{ $errors->first('cause_goal') }}</small>
                        {!! Form::number('cause_goal', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 20]", 'required']) !!}
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="cause_raised" class="col-sm-2 control-label">Cause Raised (AFG):</label>
                    <div class="col-sm-10">
                        <small class="error">{{ $errors->first('cause_raised') }}</small>
                        {!! Form::number('cause_raised', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 20]", 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="cause_description" class="col-sm-2 control-label">Cause Description:</label>
                    <div class="col-sm-10">
                        <small class="error">{{ $errors->first('cause_description') }}</small>
                        {!! Form::textarea('cause_description', null, ['class' => 'form-control', 'data-parsley-length'=>"[3, 500]", 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Update', ['class' => 'btn btn-warning col-md-12']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</section>
    <!-- /.nav-tabs-custom -->
@endsection

@section('script')
<script>
    $('#form').parsley();
</script>
@endsection
