@extends('admin.admin')

@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Donation Types</a></li>
                        <li><a href="#add_relationship" data-toggle="tab">Add Donation Type</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class=" tab-pane active" id="activity">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Donation Types</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Donates</th>
                                                <th></th>
                                            </tr>
                                            @foreach ($donation_types as $donation_type)
                                                <tr>
                                                    <td>{{ $donation_type->id }}</td>
                                                    <td>{{ $donation_type->name }}
                                                    </td>
                                                    <td> {{ $donation_type->show_value($donation_type->description) }}</td>
                                                    <td><span
                                                            class="badge bg-green">{{ $donation_type->donate->count() }}</span>
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="add_relationship">
                            {!! Form::open(['method' => 'POST', 'action' => ['App\Http\Controllers\DonationTypeController@store'], 'class' =>
                            'form-horizontal', 'id' => 'form']) !!}

                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Donnation Type Name:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('name') }}</small>
                                    {!! Form::text('name', null, ['class' => 'form-control' , 'required', 'data-parsley-length'=>"[3, 50]"]) !!}
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
