@extends('admin.admin')
@section('content')
    <section class="content-header" style="margin-bottom: 10px">
        <h1>
            Imran Chartiy Foundation Donation Boxes
        </h1>
        <div style="margin-bottom: 30px">
            <form action="{{ route('donateBox.index') }}" role="search">
                <div class="input-group input-group-md pull-right" style="width: 300px">
                    <input type="text" name="term" value="{{ Request::get('terms') }}" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="sumbit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Register Donation Boxes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding" style="min-height: 350px;">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Responsible Person</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($donationBoxes as $donationBox)
                                    <tr>
                                        <td>{{ $donationBox->id }}</td>
                                        <td>{{ $donationBox->name }}</td>
                                        <td>{{ $donationBox->location }}</td>
                                        <td><span>{{ $donationBox->status() }}</span></td>
                                        <td><a
                                                href="{{ route('user.show', $donationBox->user->id) }}">{{ $donationBox->user->first_name }}</a>
                                            </span></td>
                                        <td>{{ $donationBox->show_value($donationBox->description) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn-sm btn-success" data-toggle="dropdown">Actions
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ route('donateBox.edit', $donationBox->id) }}">Update</a>
                                                    </li>
                                                    <li><a href="{{ route('donateBox.show', $donationBox->id) }}" onclick="return confirm('Are You sure to delete')">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="box-footer pull-right">
                            {{ $donationBoxes->appends(Request::query())->render() }}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
