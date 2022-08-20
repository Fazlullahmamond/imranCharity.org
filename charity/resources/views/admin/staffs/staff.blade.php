@extends('admin.admin')

@section('content')
    <section class="content-header" style="margin-bottom: 10px">
        <div style="margin-bottom: 30px">
            <form action="{{ route('user.index') }}" role="search">
                <div class="input-group input-group-md pull-right" style="width: 300px">
                    <input type="text" name="term" value="{{ Request::get('terms') }}" class="form-control"
                        placeholder="Search">
                    <span class="input-group-btn">
                        <button type="sumbit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </section>
    <section class="content">
        <div class="row">
            @if (Session::has('user_deleted'))
                <h1 class="btn btn-primary btn-block">{{ session('user_deleted') }}</h1>
            @endif
            <div class="box">
                <div class="box-body g">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="box box-solid">
                                <div class="box-header with-border bg-primary" style="color: white">
                                    <h3 class="box-title">Users</h3>
                                    <div class="box-tools" style="color: white">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php $selected_role = Request::get('role_id'); ?>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="{{ empty($selected_role) ? 'active' : '' }}"><a
                                                href="{{ route('user.index') }}">All Users
                                                <span
                                                    class="label label-primary pull-right">{{ $total_users }}</span></a>
                                        </li>
                                        
                                        @foreach ($roles as $role)

                                            <li class="{{ $selected_role == $role->id ? 'active' : '' }}">
                                                <a href="{{ route('user.index', ['role_id' => $role->id]) }}">{{ $role->name }}
                                                <span class="label label-primary pull-right">{{ $role->user->count() }}</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /. box -->
                        </div>
                        <div class="col-md-10">
                            @foreach ($users as $user)
                                @if ($user->role->name == 'donator')
                                    @continue
                                @endif
                                <div class="col-md-4 col-lg-3">
                                    <!-- Widget: user widget style 1 -->
                                    <div class="box box-widget widget-user">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header bg-aqua-active">
                                            <h3 class="widget-user-username"><a href="{{ route('user.show', $user->id) }}"
                                                    style="color: white">{{ $user->first_name . ' ' . $user->last_name }}</a>
                                            </h3>
                                            <h5 class="widget-user-desc">{{ $user->role->name }}</h5>
                                        </div>
                                        <div class="widget-user-image">
                                            <img class="img-circle" src="{{ $user->image }}" alt="User Avatar">
                                        </div>
                                        <div class="box-footer">

                                            <!-- /.row -->
                                        </div>
                                    </div>
                                    <!-- /.widget-user -->
                                </div>

                            @endforeach
                            
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            {{-- {{ $users->appends(Request::query())->render() }} --}}
                            {{ $users->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
