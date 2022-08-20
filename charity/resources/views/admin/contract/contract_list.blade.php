@extends('admin.admin')
@section('content')
    <section class="content-header" style="margin-bottom: 10px">
        <h1>
            Imran Chartiy Foundation <em>Contracts</em>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Contracts</h3>

                        <div class="box-tools">
                            {{-- <form action="{{ route('contract.index') }}">
                                <div class="input-group" style="width: 150px;">
                                    <input type="text" name="term" value="{{ Request::get('term') }}" class="form-control pull-right" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Contract Title</th>
                                    <th>Contract With</th>
                                    <th>Contract Start Date</th>
                                    <th>Contract End Date</th>
                                    <th>Contract Description</th>
                                </tr>
                                @foreach ($contracts as $contract)
                                    <tr>
                                        <td>{{ $contract->id }}</td>
                                        <td>{{ $contract->contract_title }}</td>
                                        <td>{{ $contract->contract_with }}</td>
                                        <td>{{ $contract->contract_startDate }}</td>
                                        <td>{{ $contract->contract_endDate }} </td>
                                        <td>{{ $contract->description }}</td>
                                        <td><div class="btn-group">
                                            <button type="button" class="btn btn-danger" data-toggle="dropdown">Actions
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ route('contract.edit', $contract->id) }}">Edit</a>
                                                </li>
                                                <li><a href="{{ route('contract.show', $contract->id) }}" onclick="return confirm('Are You sure to delete')">Delete</a></li>
                                            </ul>
                                        </div></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="box-footer pull-right">

                            {{-- {{ $contracts->links()}} --}}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
