@extends('admin.admin')

@section('content')
    <section class="content-header">
        <h1>Add Blog</h1>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
            </div>
            {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\BlogController@store', 'files' => true, 'id' => 'form']) !!}
            <div class="form-group col-md-12">
                {!! Form::label('title', 'Title:') !!}
                <small class="error">{{ $errors->first('title') }}</small>
                {!! Form::text('title', null, ['class' => 'form-control', 'required', "data-parsley-length" => '[3,200]']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('text', 'Text:') !!}
                <small class="error">{{ $errors->first('text') }}</small>
                {!! Form::textarea('text', null, ['class' => 'form-control', 'required', "data-parsley-length" => '[3,500]']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('image', 'Image:') !!}
                <small class="error">{{ $errors->first('image') }}</small>
                {!! Form::file('image', ['class' => 'form-control']) !!}
                <br>-- OR --<br>
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('video_url', 'Video Url:') !!}
                <small class="error">{{ $errors->first('video_url') }}</small>
                {!! Form::url('video_url', null, ['class' => 'form-control']) !!}
            </div>
            <input type="hidden" class="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
