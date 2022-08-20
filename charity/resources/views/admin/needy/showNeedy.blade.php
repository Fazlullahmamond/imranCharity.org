@extends('admin.admin')
@section('title')
    User Profile
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset($needy->image) }}"
                            alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $needy->first_name }}</h3>

                        <p class="text-muted text-center">{{ $needy->person_type->name }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Family Members</b> <a class="pull-right">{{ $needy->family_members->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total Donates To This User</b> <a
                                    class="pull-right">{{ $needy->donate->count() }}</a>
                            </li>

                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Needy Person</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>First Name:</th>
                                        <td>{{ $needy->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name:</th>
                                        <td>{{ $needy->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Father Name:</th>
                                        <td>{{ $needy->show_value($needy->father_name) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $needy->show_value($needy->phone_number) }}</td>
                                    </tr>
                                    <tr>
                                        <th>ID Card Number:</th>
                                        <td>{{ $needy->show_value($needy->id_card_number) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Predictive Needs:</th>
                                        <td>{{ $needy->predictive_needs }}</td>
                                    </tr>
                                    <tr>
                                        <th>Needs Percentage:</th>
                                        <td>{{ $needy->needs_percentage_label() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender:</th>
                                        <td>{{ $needy->gender() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Birth:</th>
                                        <td>{{ $needy->show_value($needy->date_birth) }}</td>
                                    </tr>

                                    <tr>
                                        <th>Hometown:</th>
                                        <td>{{ $needy->show_value($needy->hometown) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Current Address:</th>
                                        <td>{{ $needy->current_address }}</td>
                                    </tr>

                                    <tr>
                                        <th>Description:</th>
                                        <td class="bg-info">{{ $needy->show_value($needy->description) }}</td>
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
            <div class="col-md-8 col-lg-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#update_info" data-toggle="tab">Update Information</a></li>
                        @if ($needy->family_members->count() != 0)
                            <li><a href="#family_members" data-toggle="tab">Family Members</a></li>
                        @endif
                        @if ($needy->donate->count() != 0)
                            <li><a href="#donates" data-toggle="tab">Donates</a></li>
                        @endif
                        <li class="pull-right">
                            <a class="btn btn-primary" href="#add_family_member" data-toggle="modal"> Add Family Member</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class=" tab-pane" id="family_members">
                            @if ($needy->family_members->count() != 0)
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Family Members of
                                            {{ $needy->first_name . ' ' . $needy->last_name }}
                                        </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 5px"></th>
                                                    <th>Name</th>
                                                    <th>Last Name</th>
                                                    <th>Relationship</th>
                                                    <th>Phone Number</th>
                                                    <th>Job</th>
                                                    <th></th>
                                                </tr>



                                                @foreach ($needy->family_members as $family_member)
                                                    <tr>
                                                        <td>
                                                            <div class="product-img">
                                                                <img src="{{ asset($family_member->image == '' ? 'backend/img/family_member/family_member.jpg' : $family_member->image ) }}"
                                                                    alt="Product Image" height="50px" width="50px"
                                                                    style="border-radius: 40px">
                                                            </div>
                                                        </td>
                                                        <td><a
                                                                href="{{ route('family.show', $family_member->id) }}">{{ $family_member->first_name . ' ' . $family_member->last_name }}</a>
                                                        </td>
                                                        <td>{{ $family_member->last_name }}</td>
                                                        <td>{{ $family_member->relationship->name }}</td>
                                                        <td>{{ $family_member->show_value($family_member->phone_number) }}</td>
                                                        <td>{{ $family_member->show_value($family_member->job) }}</td>
                                                        <td>
                                                            {!! Form::open(['method' => 'DELETE', 'action' =>
                                                            ['App\Http\Controllers\FamilyMemberController@destroy', $family_member->id]]) !!}
                                                            <input type="submit" value="Remove" class="btn btn-danger" onclick="return confirm('are you sure to delete theis member ?')">
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->

                                </div>
                            @endif
                        </div>
                        <div class="tab-pane" id="donates" > 
                            @if ($needy->donate->count() != 0)
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Donates To
                                            {{ $needy->first_name . ' ' . $needy->last_name }}
                                        </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Donator Name</th>
                                                    <th>Donation Type</th>
                                                    <th>Donation Amount</th>
                                                    <th>Donation Date</th>
                                                    <th>Donation Delivery Date</th>
                                                    <th>Donation Location</th>
                                                    <th>Help From Donation Box</th>

                                                </tr>
                                                @foreach ($needy->donate as $donate)
                                                    <tr>
                                                        <td>
                                                            @if ($donate->user_id)
                                                                <a href="{{ route('donator.show', $donate->user_id) }}">{{ $donate->user->first_name . ' ' . $donate->user->last_name }}</a>
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                        <td>{{ $donate->donation_type->name }}</td>
                                                        <td>{{ $donate->donation_amount }}</td>
                                                        <td>{{ $donate->donation_date }}</td>
                                                        <td>{{ $donate->donation_delivery == null ? 'Not Deliveryed':$donate->donation_delivery  }}</td>
                                                        <td>{{ $donate->donation_location }}</td>
                                                        @if ($donate->donation_box_id)
                                                            <td>{{ $donate->donation_box->name }}</td>
                                                        @else
                                                            <td>N/A</td>
                                                        @endif

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->

                                </div>
                            @endif
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane active" id="update_info">
                            {!! Form::model($needy, ['method' => 'PATCH', 'action' => [[App\Http\Controllers\NeedyPeopleController::class, 'update'], $needy->id], 'files' => true, 'class' => 'form-horizontal', 'id' => 'form']) !!}

                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">First Name:</label>
                                <div class="col-sm-10">
                                    {!! Form::text('first_name', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 50]" , 'required']) !!}
                                    <small class="error">{{ $errors->first('first_name') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Last Name:</label>
                                <div class="col-sm-10">
                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 50]" , 'required']) !!}
                                    <small class="error">{{ $errors->first('last_name') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Father Name:</label>
                                <div class="col-sm-10">
                                    {!! Form::text('father_name', null, ['class' => 'form-control']) !!}
                                    <small class="error">{{ $errors->first('father_name') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Phone Number:</label>
                                <div class="col-sm-10">
                                    {!! Form::text('phone_number', null, ['class' => 'form-control' ,"data-parsley-pattern-message "=>"Must Start With +9xx , 0093, 07, 7" ,'data-parsley-maxlength' => '20' ,'data-parsley-pattern' => '/(\+93|0093)?0?7[0-9]{8}/']) !!}
                                    <small class="error">{{ $errors->first('phone_number') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Hometown</label>
                                <div class="col-sm-10">
                                    {!! Form::text('hometown', null, ['class' => 'form-control']) !!}
                                    <small class="error">{{ $errors->first('hometown') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Current Address:</label>
                                <div class="col-sm-10">
                                    {!! Form::text('current_address', null, ['class' => 'form-control', 'data-parsley-length'=>"[3, 50]" , 'required']) !!}
                                    <small class="error">{{ $errors->first('current_address') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Date Birth:</label>
                                <div class="col-sm-10">
                                    {!! Form::date('date_birth', null, ['class' => 'form-control']) !!}
                                    <small class="error">{{ $errors->first('date_birth') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Gender:</label>
                                <div class="col-sm-10">
                                    {!! Form::select('gender', ['' => 'Select The Gender', 0 => 'Male', 1 => 'Female'],
                                    null, ['class' => 'form-control', 'data-parsley-length'=> '[0,1]' ,'required']) !!}
                                    <small class="error">{{ $errors->first('gender') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">ID Card Number:</label>
                                <div class="col-sm-10">
                                    {!! Form::number('id_card_number', null, ['class' => 'form-control']) !!}
                                    <small class="error">{{ $errors->first('id_card_number') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Needy Percentage:</label>
                                <div class="col-sm-10">
                                    {!! Form::number('needy_percentage', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 3]" , 'required']) !!}
                                    <small class="error">{{ $errors->first('needy_percentage') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Predictive Needs:</label>
                                <div class="col-sm-10">
                                    {!! Form::text('predictive_needs', null, ['class' => 'form-control', 'data-parsley-length'=>"[1, 20]" , 'required']) !!}
                                    <small class="error">{{ $errors->first('predictive_needs') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Person Type:</label>
                                <div class="col-sm-10">
                                    {!! Form::select('person_type_id', ['' => 'Select The Person Type'] + $person_types,
                                    null, ['class' => 'form-control','required']) !!}
                                    <small class="error">{{ $errors->first('person_type_id') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Register By:</label>
                                <div class="col-sm-10">
                                    {!! Form::select('user_id', [$needy->user->id => $needy->user->first_name],null,
                                    ['class' => 'form-control', 'required']) !!}
                                    <small class="error">{{ $errors->first('user_id') }}</small>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Image:</label>
                                <div class="col-sm-10">
                                    {!! Form::file('image', null, ['class' => 'form-control ']) !!}
                                    <input type="hidden" class="form-control" name="old_image" id="old_image" value="{{ $needy->image }}">
                                    <small class="error">{{ $errors->first('image') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Description:</label>
                                <div class="col-sm-10">
                                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                    <small class="error">{{ $errors->first('description') }}</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {!! Form::submit('Update', ['class' => 'btn btn-warning col-md-12 p-3']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
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
        <div class="modal fade" id="add_family_member">
            <div class="modal-dialog" style="min-width: 80%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add Family Member</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-warning">
                            <div class="box-header">
                            </div>
                            {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\FamilyMemberController@store', 'files' => true,
                            'id' => 'form']) !!}
                            <div class="form-group col-md-4">
                                {!! Form::label('first_name', 'First Name:') !!}
                                <small class="error">{{ $errors->first('first_name') }}</small>
                                {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name', 'data-parsley-length'=>"[3, 50]" , 'required']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('last_name', 'Last Name:') !!}
                                <small class="error">{{ $errors->first('last_name') }}</small>
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'data-parsley-length'=>"[3, 50]" , 'required']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('fatherName', 'Father Name:') !!}
                                <small class="error">{{ $errors->first('father_name') }}</small>
                                {!! Form::text('father_name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('phone_number', 'Phone Number:') !!}
                                <small class="error">{{ $errors->first('phone_number') }}</small>
                                {!! Form::text('phone_number', null, ['class' => 'form-control' ,"data-parsley-pattern-message "=>"Must Start With +9xx , 0093, 07, 7" ,'data-parsley-maxlength' => '20' ,'data-parsley-pattern' => '/(\+93|0093)?0?7[0-9]{8}/']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('job', 'Job:') !!}
                                <small class="error">{{ $errors->first('job') }}</small>
                                {!! Form::text('job', null, ['class' => 'form-control', 'data-parsley-length' => '[3, 50]'])
                                !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('date_birth', 'Date Birth:') !!}
                                <small class="error">{{ $errors->first('date_birth') }}</small>
                                {!! Form::date('date_birth', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-md-4">
                                {!! Form::label('gender', 'Gender:') !!}
                                <small class="error">{{ $errors->first('gender') }}</small>
                                {!! Form::select('gender', [0 => 'Male', 1 => 'Female'], null,
                                ['class' => 'form-control', 'data-parsley-length' => '[0, 1]', 'required']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('needy_people_id', 'Family Member Of:') !!}
                                <small class="error">{{ $errors->first('relationship_id') }}</small>
                                {!! Form::select('needy_people_id', [$needy->id => $needy->first_name], null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('relationship_id', 'Relationship Type:') !!}
                                <small class="error">{{ $errors->first('relationship_id') }}</small>
                                {!! Form::select('relationship_id', ['' => 'Select The Relationship'] +
                                $relationship, null, ['class' => 'form-control', 'required'])
                                !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('description', 'Description:') !!}
                                <small class="error">{{ $errors->first('description') }}</small>
                                {!! Form::text('description', null, ['class' => 'form-control', 'data-parsley-length' => '[3, 500]']) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('image', 'Image:') !!}
                                <small class="error">{{ $errors->first('image') }}</small>
                                {!! Form::file('image', null, ['class' => 'form-control ', 'required']) !!}
                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary pull-left col-md-12', 'id' => 'save_family_member_btn']) !!}
                            </div>
                            <div class="box-footer">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>
    <!-- /.content -->


@endsection
@section('script')
    $('#form').parsley();
@endsection
