@extends('admin.admin')

@section('content')
    <section class="content-header">
        <h1>Edit Blog</h1>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
            </div>
            {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\BlogController@update', $blog->id], 'files' => true])
            !!}
                <input type="hidden" name="old_image" value="{{ $blog->image }}">
            <div class="form-group col-md-6">
                {!! Form::label('title', 'Title:') !!}
                <small class="error">{{ $errors->first('title') }}</small>
                {!! Form::text('title', null, ['class' => 'form-control', 'required', 'data-parsley-maxlength' => '200']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('text', 'Text:') !!}
                <small class="error">{{ $errors->first('text') }}</small>
                {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text', 'required', 'data-parsley-maxlength' => '500']) !!}
            </div>
            <input type="hidden" class="hidden" name="user_id" value="{{ $blog->user_id }}">
            <div class="form-group col-md-12">
                {!! Form::submit('Save', ['class' => 'btn btn-warning col-md-12']) !!}
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
