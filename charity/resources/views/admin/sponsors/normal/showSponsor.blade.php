@extends('admin.admin')
@section('title')
    User Profile
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <img class="profile-user-img img-responsive img-circle" src="{{ asset($sponsor->image) }}"
                            alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $sponsor->first_name . ' ' . $sponsor->last_name }}</h3>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About User</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>First Name:</th>
                                        <td>{{ $sponsor->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name:</th>
                                        <td>{{ $sponsor->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $sponsor->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $sponsor->show_value($sponsor->phone_number) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender:</th>
                                        <td>{{ $sponsor->gender() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Birth:</th>
                                        <td>{{ $sponsor->show_value($sponsor->date_birth) }}</td>
                                    </tr>

                                    <tr>
                                        <th>Hometown:</th>
                                        <td>{{ $sponsor->show_value($sponsor->hometown) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Current Address:</th>
                                        <td>{{ $sponsor->show_value($sponsor->current_address) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $sponsor->status() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Verified:</th>
                                        <td>{{ $sponsor->verified($sponsor->email_verified_at) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Verified:</th>
                                        <td>{{ $sponsor->verified($sponsor->phone_verified_at) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description:</th>
                                        <td class="bg-info">{{ $sponsor->description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#update_info" data-toggle="tab">Update Information</a></li>
                        @if ($sponsor->donate->count() != 0)
                            <li><a href="#activity" data-toggle="tab">Activity</a></li>
                        @endif

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="update_info">
                            {!! Form::model($sponsor, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\DonatorController@update', $sponsor->id],
                            'files' => true, 'class' => 'form-horizontal']) !!}

                            <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">First Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('first_name') }}</small>
                                    {!! Form::text('first_name', null, ['class' => 'form-control','required', "data-parsley-length" => '[2,50]']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="col-sm-2 control-label">Last Name<span class="text-danger">*</span>:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('last_name') }}</small>
                                    {!! Form::text('last_name', null, ['class' => 'form-control','required', "data-parsley-length" => '[2,50]']) !!}
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Email<span class="text-danger">*</span>:</label>
                                <div class="col-sm-10">
                                    {!! Form::email('email', null, ['class' => 'form-control','required']) !!}
                                    <small class="error">{{ $errors->first('email') }}</small>
                                </div>
                            </div> --}}
                            {{-- @if ($sponsor->id == Auth::user()->id)
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Password<span class="text-danger">*</span>:</label>
                                    <div class="col-sm-10">
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                     <small class="error">{{ $errors->first('password') }}</small>
                                    </div>

                                </div>
                            @endif --}}

                            <div class="form-group">
                                <label for="phone_number" class="col-sm-2 control-label">Phone Number :</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('phone_number') }}</small>
                                    {!! Form::text('phone_number', null, ['class' => 'form-control', "data-parsley-pattern-message "=>"Must Start With +9xx , 0093, 07, 7" ,'data-parsley-maxlength' => '15' ,'data-parsley-pattern' => '/(\+93|0093)?0?7[0-9]{8}/']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date_birth" class="col-sm-2 control-label">Date Birth:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('date_birth') }}</small>
                                    {!! Form::date('date_birth', null, ['class' => 'form-control']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hometown" class="col-sm-2 control-label">Hometown:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('hometown') }}</small>
                                    {!! Form::text('hometown', null, ['class' => 'form-control', "data-parsley-length" => '[2,200]']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_address" class="col-sm-2 control-label">Current Address:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('current_address') }}</small>
                                    {!! Form::text('current_address', null, ['class' => 'form-control', "data-parsley-length" => '[2,200]']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Gender<span class="text-danger">*</span>:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('gender') }}</small>
                                    {!! Form::select('gender', [0 => 'Male', 1 => 'Female'], null, ['class' => 'form-control', 'required']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status<span class="text-danger">*</span>:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('status') }}</small>
                                    {!! Form::select('status', [1 => 'Active', 0 => 'Not Active'], null, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Description:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('description') }}</small>
                                    {!! Form::text('description', null, ['class' => 'form-control', "data-parsley-length" => '[2,500]']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-2 control-label">Image:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('image') }}</small>
                                    {!! Form::file('image', ['class' => 'form-control']) !!}
                                    <input type="hidden" class="form-control" name="old_image" id="old_image" value="{{ $sponsor->image }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {!! Form::submit('Update', ['class' => 'btn btn-primary col-md-12 p-3']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                        <div class="tab-pane" id="activity">
                            @if ($sponsor->donate->count() != 0)
                                <div class="box table-responsive">
                                    <div class="box-header">
                                        <h3 class="box-title">Needy People Belongs To This User</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Donate To</th>
                                                    <th>Donation Type</th>
                                                    <th>Donation Amount </th>
                                                    <th>Donation Date</th>
                                                    <th>Donation Delivery Date</th>
                                                    <th>Donation Location</th>

                                                </tr>
                                                @foreach ($sponsor->donate as $donate)
                                                    <tr>
                                                        <td> <a href="{{ route('needy.show', $donate->needy_people_id) }}">{{ $donate->needy_people->first_name . ' ' . $donate->needy_people->last_name }}</a></td>
                                                        <td>{{ $donate->donation_type->name }}</td>
                                                        <td>{{ $donate->donation_amount}}</td>
                                                        <td>{{ $donate->donation_date }}</td>
                                                        <td>{{ $donate->donation_delivery == null ? 'Not Deliveried': $donate->donation_delivery }}</td>
                                                        
                                                        <td>{{ $donate->donation_location }}</td>

                                                        {{-- <td> {{ $donate->needs_percentage_bar() }}</td>
                                                        <td>{{ $donate->needs_percentage_label() }}</td> --}}
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->

                                </div>
                            @endif
                            <!-- /.box -->
                        </div>
                        <!-- /.tab-pane -->
                        
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
    </div>
@endsection
