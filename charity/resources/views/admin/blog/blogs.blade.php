@extends('admin.admin')

@section('content')
    <section class="content-header" style="margin-bottom: 10px">
        <h1>
            User Blog Tables
        </h1>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12 ">
                <form action="{{ route('blog.index') }}" role="search">
                    <div class="input-group input-group-md pull-right" style="width: 300px">
                        <input type="text" name="term" value="{{ Request::get('terms') }}" class="form-control"
                            placeholder="Search">
                        <span class="input-group-btn">
                            <button type="sumbit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            @foreach ($blogs as $blog)
                <div class="col-md-12 p-4">
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <img class="img-circle" src="{{ $blog->user->image }}" alt="User Image">
                                <span class="username"><a
                                        href="{{ route('user.show', $blog->user_id  ) }}">{{ $blog->user->first_name . ' ' . $blog->user->last_name }}</a></span>
                                <span class="description">Shared publicly - {{ $blog->created_at->diffForHumans() }}</span>
                            </div>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <h4 style="margin-left:20px">{{ $blog->title }}</h4>
                            <p style="margin-left:20px">{{ $blog->text }}</p>
                            @if($blog->video_url != null)
                                <video style="width: 100%; height:80%" alt="{{ $blog->title }}" controls>
                                    <source src="{{$blog->video_url}}" type="video/mp4">
                                    <source src="{{$blog->video_url}}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                            <img class="img-responsive pad" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; height:auto;">
                            @endif
                            <div class="btn-group col-md-12">
                                <a class="btn btn-primary col-md-6" href="{{ route('blog.edit', $blog->id) }}">Edit</a>
                                <a class="btn btn-danger col-md-6" href="{{ route('blog.show', $blog->id) }}" onclick="return confirm('Are You sure to delete')">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="box-footer">
                <div class="pull-right">
                    {{ $blogs->appends(Request::query())->render() }}
                </div>
            </div>
        </div>

    </section>

@endsection

@section('script')
<script>
    $('#form').parsley();
</script>
@endsection
