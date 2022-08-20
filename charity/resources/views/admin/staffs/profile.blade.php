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

                        <img class="profile-user-img img-responsive img-circle" src="{{ asset($user->image) }}"
                            alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $user->first_name }}</h3>

                        <p class="text-muted text-center">{{ $user->role->name }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Total Needy Register By This User</b> <a
                                    class="pull-right">{{ $user->needy_people->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total Donate Boxes Beloge To This User</b> <a
                                    class="pull-right">{{ $user->donation_box->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total Blog Post By This User</b> <a class="pull-right">{{ $user->blog->count() }}</a>
                            </li>
                        </ul>
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
                                        <td>{{ $user->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name:</th>
                                        <td>{{ $user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $user->show_value($user->phone_number) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender:</th>
                                        <td>{{ $user->gender() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Birth:</th>
                                        <td>{{ $user->show_value($user->date_birth) }}</td>
                                    </tr>

                                    <tr>
                                        <th>Hometown:</th>
                                        <td>{{ $user->show_value($user->hometown) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Current Address:</th>
                                        <td>{{ $user->show_value($user->current_address) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $user->status() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Verified:</th>
                                        <td>{{ $user->verified($user->email_verified_at) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Verified:</th>
                                        <td>{{ $user->verified($user->phone_verified_at) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description:</th>
                                        <td class="bg-info">{{ $user->description }}</td>
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
                        @if ($user->needy_people->count() != 0 || $user->donation_box->count() != 0)
                            <li><a href="#activity" data-toggle="tab">Activity</a></li>
                        @endif

                        @if ($user->blog->count() != 0)
                            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                                                <!-- /.tab-pane -->
                        <div class="tab-pane active"
                            id="update_info">
                            {!! Form::model($user, ['method' => 'PATCH', 'action' => [[App\Http\Controllers\UserController::class, 'update'], $user->id],
                            'files' => true, 'class' => 'form-horizontal', 'id' => 'form']) !!}

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
                            
                            @if ($user->id == Auth::user()->id)
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email<span class="text-danger">*</span>:</label>
                                    <div class="col-sm-10">
                                        <small class="error">{{ $errors->first('email') }}</small>
                                        {!! Form::email('email', null, ['class' => 'form-control', 'data-parsley-type'=>"email", 'required']) !!}
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Password<span class="text-danger">*</span>:</label>
                                        <div class="col-sm-10">
                                            <small class="error">{{ $errors->first('password') }}</small>
                                            {!! Form::password('password', ['class' => 'form-control', 'data-parsley-length'=>"[6, 40]"]) !!}
                                        </div>

                                </div>
                            @endif

                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Phone Number:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('phone_number') }}</small>
                                    {!! Form::text('phone_number', null, ['class' => 'form-control', "data-parsley-pattern-message "=>"Must Start With +9xx , 0093, 07, 7" ,'data-parsley-maxlength' => '15' ,'data-parsley-pattern' => '/(\+93|0093)?0?7[0-9]{8}/']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Date Birth:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('date_birth') }}</small>
                                    {!! Form::date('date_birth', null, ['class' => 'form-control']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Hometown:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('hometown') }}</small>
                                    {!! Form::text('hometown', null, ['class' => 'form-control', 'data-parsley-length'=>"[2, 200]"]) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Current Address:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('current_address') }}</small>
                                    {!! Form::text('current_address', null, ['class' => 'form-control', 'data-parsley-length'=>"[2, 200]"]) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Gender<span class="text-danger">*</span>:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('gender') }}</small>
                                    {!! Form::select('gender', [1 => 'Male', 2 => 'Female'], null, ['class' => 'form-control','data-parsley-length'=>"[1, 2]", 'required']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role_id" class="col-sm-2 control-label">Position<span class="text-danger">*</span>:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('role_id') }}</small>
                                    {!! Form::select('role_id', ['' => 'Selcet the Poition'] + $roles, null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 7]", 'required']) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('statis') }}</small>
                                    {!! Form::select('status', [1 => 'Active', 0 => 'Not Active'], null, ['class' => 'form-control', 'data-parsley-length'=>"[0, 1]", 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Description:</label>
                                <div class="col-sm-10">
                                    <small class="error">{{ $errors->first('description') }}</small>
                                    {!! Form::text('description', null, ['class' => 'form-control', 'data-parsley-length'=>"[3, 250]"]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Image:</label>
                                <div class="col-sm-10">
                                    {!! Form::file('image', ['class' => 'form-control']) !!}
                                    <small class="error">{{ $errors->first('image') }}</small>
                                    <input type="hidden" class="form-control" name="old_image" id="old_image" value="{{ $user->image }}">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Email Verified:</label>
                                <div class="col-sm-10">
                                    {!! Form::checkbox('email_verified') !!}
                                    <small class="error">{{ $errors->first('email_verified') }}</small>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Phone Verified:</label>
                                <div class="col-sm-10">
                                    {!! Form::checkbox('phone_verified') !!}
                                    <small class="error">{{ $errors->first('phone_verified') }}</small>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {!! Form::submit('Update', ['class' => 'btn btn-primary col-md-12 p-3']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class=" tab-pane" id="activity">
                            @if ($user->needy_people->count() != 0)
                                <div class="box table-responsive">
                                    <div class="box-header">
                                        <h3 class="box-title">Needy People Belongs To This User</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Person Type</th>
                                                    <th>Needs Percentage </th>
                                                    <th style="width: 40px"></th>
                                                </tr>
                                                @foreach ($user->needy_people as $needy)
                                                    <tr>
                                                        <td><a href="{{ route('needy.show', $needy->id) }}">{{ $needy->first_name . ' ' . $needy->last_name }}</a> </td>
                                                        <td>{{ $needy->person_type->name }}</td>
                                                        <td> {{ $needy->needs_percentage_bar() }}</td>
                                                        <td>{{ $needy->needs_percentage_label() }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->

                                </div>
                            @endif

                            <!-- /.box -->
                            @if ($user->donation_box->count() != 0)
                                <div class="box table-responsive">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Donation Boxes Belongs To This User</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Location</th>
                                                    <th>Status </th>
                                                    <th style="width: 40px">Description</th>
                                                </tr>
                                                @foreach ($user->donation_box as $box)
                                                    <tr>
                                                        <td>{{ $box->name }}</td>
                                                        <td>{{ $box->location }}</td>
                                                        <td> {{ $box->status() }}</td>
                                                        <td>{{ $box->description }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                            <!-- /.box -->
                        </div>
                        @if ($user->blog->count() != 0)
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    @foreach ($user->blog as $blog)
                                        <li>

                                            <div class="timeline-item">
                                                <span class="time"><i
                                                        class="fa fa-clock-o"></i>{{ $blog->created_at->diffForHumans() }}
                                                </span>
                                                <h3 class="timeline-header">{{ $blog->title }}</h3>
                                                <div class="timeline-body">
                                                    @if($blog->video_url != null)
                                                    <video style="width: 100%; height:80%" alt="{{ $blog->title }}" controls>
                                                        <source src="{{$blog->video_url}}" type="video/mp4">
                                                        <source src="{{$blog->video_url}}" type="video/ogg">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                <img class="img-responsive pad" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; height:auto;">
                                                @endif
                                                    <p style="margin-left: 15px">{{ $blog->text }}</p>
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-primary btn-xs" href="{{ route('blog.edit', $blog->id) }}">Update</a>
                                                    <a class="btn btn-danger btn-xs pull-right" href="{{ route('blog.show', $blog->id) }}" onclick="return confirm('Are You sure to delete')">Delate</a>

                                                </div>
                                            </div>
                                        </li>

                                    @endforeach

                                    <!-- END timeline item -->
                                    <!-- timeline item -->

                                    <!-- END timeline item -->
                                </ul>
                            </div>
                            <!-- /.tab-pane -->
                        @endif


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
@section('script')
<script>
    var simplemde = new SimpleMDE({element: $("#descirtion")[0]});
    $('#form').parsley();
</script>
@endsection
