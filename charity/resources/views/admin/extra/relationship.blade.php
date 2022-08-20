@extends('admin.admin')

@section('content')
<section class="content">
<div class="row">

<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Relationships</a></li>
            <li><a href="#add_relationship" data-toggle="tab">Add Relationship</a></li>
        </ul>
        <div class="tab-content">
            <div class=" tab-pane active" id="activity">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Relationships</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Peoples have this Relationship</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($relationships as $relationship)
                                        <tr>
                                            <td>{{ $relationship->id }}</td>
                                            <td>{{ $relationship->name }}</td>
                                            <td> {{ $relationship->show_value($relationship->description) }}</td>
                                            <td><span class="badge bg-green">{{ $relationship->family_member->count() }}</span></td>
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
                {!! Form::open(['method' => 'POST', 'action' => ['App\Http\Controllers\RelationshipController@store'],
               'class' => 'form-horizontal', 'id' => 'form']) !!}

                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Relationship Name:</label>
                    <div class="col-sm-10">
                        <small class="error">{{ $errors->first('name') }}</small>
                        {!! Form::text('name', null, ['class' => 'form-control', 'data-parsley-length'=>"[3, 50]", 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Description:</label>
                    <div class="col-sm-10">
                        <small class="error">{{ $errors->first('description') }}</small>
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'data-parsley-maxlength' => '250']) !!}
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
