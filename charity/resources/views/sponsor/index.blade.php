@extends('sponsor.sponsor')
@section('title')
  Sponsor
@endsection
@section('content')
    <!-- Main content -->
  
    @if (Auth::user()->donate->count() != 0)
    <div class="box table-responsive">
        <div class="box-header">
            <h3 class="box-title">Needy People Belongs To You</h3>
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
                    @foreach ($donates as $donate)
                        <tr>
                            <td> <a href="{{ route('sponsor.show', $donate->needy_people_id) }}">{{ $donate->needy_people->first_name . ' ' . $donate->needy_people->last_name }}</a></td>
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
@else
    <div class="alert alert-warning"><strong>You do not have any donation. </strong></div>
@endif

@endsection