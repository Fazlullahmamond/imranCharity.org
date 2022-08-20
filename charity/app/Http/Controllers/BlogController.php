<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Inline\Element\Image;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsAdmin']);
    }

    public function getRequest(BlogRequest $request)
    {
       $data = $request->all();
       if($file = $request->file('image')){
           $image = time(). '.' . $file->getClientOriginalExtension();
           $file->move('backend/img/blogs', $image);
           $data['image'] = $image;
       }
       return $data;
    }

    /**
     * Display a listing of the resource;.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = Blog::where(function($query) use ($request){
            if($term = $request->get('term')){
                $keyword = '%' . $term . '%';
                $query->orWhere('title', 'Like', $keyword);
            }
        })->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.blog.blogs', compact('blogs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.addBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        if($request->file('image') && $request->get('video_url')){
                return redirect()->back()->with('message', 'You cannot add both image and video at a time.');
        }else{
            $data = $this->getRequest($request);
            Blog::create($data);
            return redirect('blog')->with('message', 'Blog Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // delete the image
        $blog = Blog::findOrFail($id);
        if($blog->image != 'backend/img/blogs/'){
            unlink($blog->image);
        }
        //deleteg posts
        $blog->delete();
        return Redirect()->back()->with('message', 'Post Deleted!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.editBlog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:200',
            'text' => 'required|string|min:3|max:500',
            'user_id' =>'required|numeric' 
        ]);

        $data = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($data);
        return redirect('blog')->with('message', 'Blog Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // // delete the image
        // $blog = Blog::findOrFail($id);
        // if($blog->image != 'backend/img/blogs/'){
        //     unlink($blog->image);
        // }
        // //deleteg posts
        // $blog->delete();
        // return Redirect()->back()->with('message', 'Post Deleted!');
    }
}
