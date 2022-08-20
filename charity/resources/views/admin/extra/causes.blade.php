@extends('admin.admin')

@section('content')
<section class="content">
<div class="row">

<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Causes for Web Page</a></li>
            <li><a href="#add_relationship" data-toggle="tab">Add Recent Causes</a></li>
        </ul>
        <div class="tab-content">
            <div class=" tab-pane active" id="activity">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Appeals</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cause Titel</th>
                                        <th>Cause Description</th>
                                        <th>Cause Goal</th>
                                        <th>Cause Raised</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($causes as $cause)
                                        <tr>
                                            <td>{{ $cause->id }}</td>
                                            <td>{{ $cause->cause_title }}</td>
                                            <td>{{ $cause->cause_description }}</td>
                                            <td>{{ $cause->cause_goal }} AFG</td>
                                            <td>{{ $cause->cause_raised }} AFG</td>
                                            <td>
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-danger" data-toggle="dropdown">Actions
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ route('causes.edit', $cause->id) }}">Update</a>
                                                    </li>
                                                    <li><a href="{{ route('causes.show', $cause->id) }}" onclick="return confirm('Are You sure to delete')">Delete</a></li>
                                                </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->

                    </div>

                <!-- /.box -->

                <!-- /.box -->
            </div>


            <!-- /.tab-pane -->
            <!-- /.tab-pane -->
            <div class="tab-pane " id="add_relationship">
                {!! Form::open(['method' => 'POST', 'action' => ['App\Http\Controllers\CauseController@store'],
               'class' => 'form-horizontal', 'id' => 'form']) !!}

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
                        {!! Form::submit('Save', ['class' => 'btn btn-primary col-md-12']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
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
