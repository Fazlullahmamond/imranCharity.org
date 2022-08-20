@extends('admin.admin')

@section('content')
    <section class="content-header" style="margin-bottom: 10px">


    </section>
    <section class="content">
        <div class="box">


            <div class="box-header" style="margin-bottom: 10px">
                <h3 class="box-title">Sponsors of Imran Charity</h3>
                <div class="box-tools">
                    <form action="{{ route('donator.index') }}">
                        <div class="input-group" style="width: 200px;">
                            <input type="text" name="term" value="{{ Request::get('term') }}"
                                class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="min-height: 350px">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>date_birth</th>
                            <th>Gender</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($sponsors as $sponsor)
                            <tr>
                                <td> <a
                                        href="{{ route('donator.show', $sponsor->id) }}">{{ $sponsor->first_name . ' ' . $sponsor->last_name }}</a>
                                </td>
                                <td>{{ $sponsor->email }}</td>
                                <td>{{ $sponsor->show_value($sponsor->phone_number) }}</td>
                                <td>{{ $sponsor->show_value($sponsor->date_birth) }}</td>
                                <td>{{ $sponsor->gender() }}</td>
                                <td>{{ $sponsor->status() }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $sponsors->links("pagination::bootstrap-4") }}
                </ul>
            </div>

        </div>
        <!-- /.box-body -->

    </section>

@endsection
