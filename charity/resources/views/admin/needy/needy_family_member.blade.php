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
                        <?php $selected_relationship_type = Request::get('relationship_id'); ?>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="{{ empty($selected_relationship_type) ? 'active' : '' }}"><a
                                        href="{{ route('family.index') }}">All Needy People
                                        <span
                                            class="label label-primary pull-right">{{ App\FamilyMember::count() }}</span></a>
                                </li>
                                @foreach (App\Relationship::all() as $relationship)
                                    <li class="{{ $selected_relationship_type == $relationship->id ? 'active' : '' }}"><a
                                            href="{{ route('family.index', ['relationship_id' => $relationship->id]) }}">{{ $relationship->name }}
                                            <span
                                                class="label label-primary pull-right">{{ $relationship->family_member->count() }}</span></a>
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
                            <form action="{{ route('family.index') }}">
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
                    <div class="box-body table-responsive no-padding">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px"></th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Phone Number</th>
                                    <th>Gender</th>
                                    <th>Date Birth</th>
                                    <th>Relationship Type</th>
                                    <th>Family Member Of</th>
                                    <th>Job</th>

                                    <th style="width: 40px"></th>
                                </tr>
                                @foreach ($family_members as $family_member)
                                    <tr>
                                        <td>
                                            <div class="product-img">
                                                <img src="{{ asset($family_member->image) }}" alt="Product Image"
                                                    height="50px" width="50px" style="border-radius: 40px">
                                            </div>
                                        </td>
                                        <td>{{ $family_member->first_name . ' ' . $family_member->last_name }}</td>
                                        <td>{{ $family_member->father_name }}</td>
                                        <td>{{ $family_member->phone_number }}</td>
                                        <td>{{ $family_member->gender() }}</td>
                                        <td>{{ $family_member->date_birth }}</td>
                                        <td>{{ $family_member->relationship->name }}</td>
                                        <td><a
                                                href="{{ route('needy.show', $family_member->needy_people->id) }}">{{ $family_member->needy_people->first_name . ' ' . $family_member->needy_people->last_name }}</a>
                                        </td>
                                        <td>{{ $family_member->job }}</td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $family_members->appends(Request::query())->render() }}
                </ul>
            </div>
        </div>
    </section>

@endsection
