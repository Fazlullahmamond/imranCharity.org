@extends('admin.admin')
@section('content')
    <section class="content-header" style="margin-bottom: 10px">
        <h1>
            Imran Chartiy Foundation <em>Donates</em>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Donates</h3>

                        <div class="box-tools">
                            <form action="{{ route('donate.index') }}">
                            <div class="input-group" style="width: 150px;">
                                <input type="text" name="term" value="{{ Request::get('term') }}" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Donator Name</th>
                                    <th>Donate To</th>
                                    <th>Donation Type</th>
                                    <th>Donation Amount</th>
                                    <th>Donate Location</th>
                                    <th>Donation Delivery Date</th>
                                    <th>Help Form Donation Box</th>
                                    <th>Description</th>
                                </tr>
                                @foreach ($donates as $donate)
                                    <tr>
                                        <td>{{ $donate->id }}</td>

                                        @if($donate->user_id)
                                        <td> <a href="{{ route('donator.show', $donate->user_id) }}">{{ $donate->user->first_name . ' ' . $donate->user->last_name}}</a> </td>
                                        @else
                                        <td><span class="label label-info">Not Available</span></td>
                                        @endif

                                        @if($donate->needy_people_id)
                                        <td> <a href="{{ route('needy.show', $donate->needy_people_id) }}">{{ $donate->needy_people->first_name . ' ' . $donate->needy_people->last_name}}</a> </td>      
                                        @else
                                        <td><span class="label label-info">Not Available</span></td>
                                        @endif
                                        <td>{{ $donate->donation_type->name }}</td>
                                        <td>{{ $donate->donation_amount . ' '.  $donate->currency }} </td>
                                        <td>{{ $donate->donation_location }}</td>
                                        <td>{{ $donate->donation_delivery == null ? 'Not Delivered':$donate->donation_delivery  }}</td>
                                        <td>{{ $donate->donation_box == null ? "N/A" : $donate->donation_box->name }}</td>
                                        <td>{{ $donate->show_value($donate->description) }}</td>
                                        <td><div class="btn-group">
                                            <button type="button" class="btn btn-danger" data-toggle="dropdown">Actions
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ route('donate.edit', $donate->id) }}">Update</a>
                                                </li>
                                                <li><a href="{{ route('donate.show', $donate->id) }}" onclick="return confirm('Are You sure to delete')">Delete</a></li>
                                            </ul>
                                        </div></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="box-footer pull-right">

                            {{-- {{ $donates->links()}} --}}
                            {{ $donates->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
