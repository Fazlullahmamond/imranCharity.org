@extends('sponsor.sponsor')
@section('title')
    Profile
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <img class="profile-user-img img-responsive img-circle" src="{{ asset(Auth::user()->image) }}"
                            alt="User profile picture">
                        <h3 class="profile-username text-center">{{ Auth::user()->first_name }}</h3>

                        <p class="text-muted text-center">{{ Auth::user()->role->name }}</p>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>First Name:</th>
                                            <td>{{ Auth::user()->first_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name:</th>
                                            <td>{{ Auth::user()->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td>{{ Auth::user()->show_value(Auth::user()->phone_number) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender:</th>
                                            <td>{{ Auth::user()->gender() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Birth:</th>
                                            <td>{{ Auth::user()->show_value(Auth::user()->date_birth) }}</td>
                                        </tr>
    
                                        <tr>
                                            <th>Hometown:</th>
                                            <td>{{ Auth::user()->show_value(Auth::user()->hometown) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Current Address:</th>
                                            <td>{{ Auth::user()->show_value(Auth::user()->current_address) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description:</th>
                                            <td class="bg-info">{{ Auth::user()->description }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        @if (session('change_password'))
                            <li><a href="#update_info" data-toggle="tab">Update Information</a></li>
                            <li class="active"><a href="#update_password" data-toggle="tab">Change Pasword</a></li>
                        @else
                        <li class="active"><a href="#update_info" data-toggle="tab">Update Information</a></li>
                        <li><a href="#update_password" data-toggle="tab">Change Pasword</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        @if (session('change_password'))
                            <div class="tab-pane" id="update_info">
                        @else
                            <div class="tab-pane active" id="update_info">
                        @endif
                            {!! Form::model(Auth::user(), ['method' => 'PATCH', 'action' => [[App\Http\Controllers\SponsorController::class, 'update'], Auth::user()->id], 'files' => true, 'class' => 'form-horizontal', 'id' => 'form']) !!}

                            <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">First Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('first_name') }}</small>
                                    {!! Form::text('first_name', null, ['class' => 'form-control', 'data-parsley-length'=>"2, 50]", 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="col-sm-2 control-label">Last Name<span class="text-danger">*</span>:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('last_name') }}</small>
                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'data-parsley-length'=>"[2, 50]", ]) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number" class="col-sm-2 control-label">Phone Number:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('phone_number') }}</small>
                                    {!! Form::text('phone_number', null, ['class' => 'form-control', "data-parsley-pattern-message "=>"Must Start With +9xx , 0093, 07, 7" ,'data-parsley-maxlength' => '20' ,'data-parsley-pattern' => '/(\+93|0093)?0?7[0-9]{8}/']) !!}
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
                                    {!! Form::text('hometown', null, ['class' => 'form-control', 'data-parsley-length'=>"[2, 100]"]) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_address" class="col-sm-2 control-label">Current Address:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('current_address') }}</small>
                                    {!! Form::text('current_address', null, ['class' => 'form-control', 'data-parsley-length'=>"[2, 100]"]) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-2 control-label">Gender<span class="text-danger">*</span>:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('gender') }}</small>
                                    {!! Form::select('gender', [0 => 'Male', 1 => 'Female'], null, ['class' => 'form-control', 'required']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Bio:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('description') }}</small>
                                    {!! Form::text('description', null, ['class' => 'form-control', 'data-parsley-length'=>"[3, 250]"]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Profile Image:</label>
                                <div class="col-sm-10">
                                    {!! Form::file('image', ['class' => 'form-control']) !!}
                                    <small class="error">{{ $errors->first('image') }}</small>
                                    <input type="hidden" class="form-control" name="old_image" id="old_image" value="{{ Auth::user()->image }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {!! Form::submit('Update', ['class' => 'btn btn-primary col-md-12 p-3']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>


                    <!-- /.tab-content -->
                        @if (session('change_password'))
                            <div class="tab-pane active" id="update_password">
                        @else
                            <div class="tab-pane" id="update_password">
                        @endif
                            <form method="POST" action="{{ route('change.password') }}", class="form-horizontal">
                            @csrf

                            <small class="error">{{ session('change_password') }}</small>
                            <div class="form-group">
                                <label for="current_password" class="col-sm-2 control-label">Current Password<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="current_password" class="form-control" data-parsley-length='(6, 30)' , required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password" class="col-sm-2 control-label">New Password<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="new_password" class="form-control" data-parsley-length='(6, 30)' , required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="col-sm-2 control-label">Confirm Password<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="confirm_password" class="form-control" data-parsley-length='(6, 30)' , required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" name="submit" class="btn btn-primary col-md-12 p-3">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
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
@section('script')
<script>
    $('#form').parsley();
</script>
@endsection