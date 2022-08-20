@extends('admin.admin')

@section('content')
    <section class="content-header" style="margin-bottom: 10px">


    </section>
    <section class="content">
        <div class="box">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <div class="box box-solid">
                        <div class="box-header with-border bg-primary" style="color: white">
                            <h3 class="box-title">Needy People Filter</h3>
                            <div class="box-tools" style="color: white">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <?php $selected_person_type = Request::get('person_type_id'); ?>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="{{ empty($selected_person_type) ? 'active' : '' }}"><a
                                        href="{{ route('needy.index') }}">All Needy People
                                        <span class="label label-primary pull-right">{{ $needy_people->count() }}</span></a>
                                </li>
                                @foreach (App\Models\PersonType::all() as $person_type)
                                    <li class="{{ $selected_person_type == $person_type->id ? 'active' : '' }}"><a
                                            href="{{ route('needy.index', ['person_type_id' => $person_type->id]) }}">{{ $person_type->name }}
                                            <span
                                             class="label label-primary pull-right">{{ $person_type->needy_people->count() }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <div class="col-md-10">
                    <div class="box-header" style="margin-bottom: 10px">
                        <h3 class="box-title">Needy People</h3>
                        <div class="box-tools">
                            <form action="{{ route('needy.index') }}">
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
                    <div class="box-body table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <th>Person Type</th>
                                    <th>Register By</th>
                                    <th>Predictive needs </th>
                                    <th>Percengate of Needs</th>
                                    <th style="width: 40px"></th>
                                </tr>
                                @foreach ($needy_people as $needy)
                                    <tr>
                                        <td> <a
                                                href="{{ route('needy.show', $needy->id) }}">{{ $needy->first_name . ' ' . $needy->last_name }}</a>
                                        </td>
                                        <td>{{ $needy->person_type->name }}</td>
                                        <td> <a
                                                href="{{ route('user.show', $needy->user_id) }}">{{ $needy->user->first_name . ' ' . $needy->user->last_name }}</a>
                                        </td>
                                        <td>{{ $needy->predictive_needs }}</td>
                                        <td>{{ $needy->needs_percentage_bar() }}</td>
                                        <td>{{ $needy->needs_percentage_label() }}</td>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $needy_people->appends(Request::query())->render() }}
                </ul>
            </div>
        </div>
    </section>

@endsection
