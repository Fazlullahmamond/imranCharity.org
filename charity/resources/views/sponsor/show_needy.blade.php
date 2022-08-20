@extends('sponsor.sponsor')
@section('title')
    Needy Profile
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset($needy->image) }}"
                            alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $needy->first_name }} {{ $needy->last_name }}</h3>

                        <p class="text-muted text-center">{{ $needy->person_type->name }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Family Members</b> <a class="pull-right">{{ $needy->family_members->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total Donates To This User</b> <a class="pull-right">{{ $needy->donate->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Needs Percentage</b><a class="pull-right">{{ $needy->needs_percentage_label() }}</a>
                            </li>

                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
                <!-- /.box -->

                <!-- About Me Box -->
            <div class="col-md-6">
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
                                        <th>Predictive Needs:</th>
                                        <td>{{ $needy->predictive_needs }}</td>
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
        </div>
    </section>

@endsection
