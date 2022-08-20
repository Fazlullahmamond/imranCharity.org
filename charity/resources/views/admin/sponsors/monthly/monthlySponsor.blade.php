@extends('admin.admin')

@section('content')
    <section class="content-header" style="margin-bottom: 10px">


    </section>
    <section class="content">
        <div class="box">


            <div class="box-header" style="margin-bottom: 10px">
                <h3 class="box-title">Monthly Sponsors of Imran Charity</h3>
                <div class="box-tools">
                    <form action="{{ route('monthly_sponsors.index') }}">
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
            <div class="box-body table-responsive"  style="min-height: 350px">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Donator Name</th>
                            <th>Donate To</th>
                            <th>Monthly Amount</th>
                            <th>Duration</th>
                            <th>Description</th>
                        </tr>
                        @foreach ($monthly_sponsors as $monthly_sponsor)
                            <tr>
                                <td> <a
                                        href="{{ route('donator.show', $monthly_sponsor->user->id) }}">{{ $monthly_sponsor->user->first_name . ' ' . $monthly_sponsor->user->last_name }}</a>
                                </td>
                                <td> <a
                                    href="{{ route('needy.show', $monthly_sponsor->needy_people->id) }}">{{ $monthly_sponsor->needy_people->first_name . ' ' . $monthly_sponsor->needy_people->last_name }}</a>
                            </td>
                                <td>{{ $monthly_sponsor->monthly_amount }}</td>
                                <td>{{ $monthly_sponsor->show_value($monthly_sponsor->duration) }}</td>
                                <td>{{ $monthly_sponsor->show_value($monthly_sponsor->description) }}</td>
                                <td><div class="btn-group">
                                    <button type="button" class="btn-sm btn-success" data-toggle="dropdown">Actions
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('monthly_sponsors.edit', $monthly_sponsor->id) }}">Update</a> </li>
                                        <li><a href="{{ route('monthly_sponsors.show', $monthly_sponsor->id) }}" onclick="return confirm('Are You sure to delete')">Delete</a></li>
                                    </ul>
                                </div></td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $monthly_sponsors->appends(Request::query())->render() }}
                </ul>
            </div>

        </div>
        <!-- /.box-body -->

    </section>

@endsection
