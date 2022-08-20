<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'IsAdmin']);
    }

    private $limit = 8;


    private function getRequest(Request $request)
    {

        $data = $request->all();
        
        if ($file = $request->file('image')) {
            $old_image = $request->old_image;
            if($old_image != 'backend/img/users/user.jpg'){
                unlink($old_image);
            }
            $image_name = $request->first_name . time() .'.'. $file->getClientOriginalExtension();
            $file->move('backend/img/users/', $image_name);
            // $image_path = Storage::disk('public')->putFile('backend/img/users', $request->file('image'));
            $data['image'] = $image_name;
        }
    
        $data['email_verified_at'] = Carbon::now();
        $data['phone_verified_at'] = Carbon::now();
        return $data;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where(function ($query) use ($request) {
            if ($role_id = ($request->get('role_id'))) {
                $query->where('role_id', $role_id);
            }
            if (($term = $request->get('term'))) {
                $keyword =  '%' . $term . '%';
                $query->orWhere('first_name', 'Like', $keyword);
                $query->orWhere('last_name', 'Like', $keyword);
                $query->orWhere('email', 'Like', $keyword);
                $query->orWhere('phone_number', 'Like', $keyword);
            }
        })->orderBy('first_name', 'asc')->paginate($this->limit);
        $roles = Role::where('name', '!=', 'donator')->get();
        $total_users = User::where('role_id', '!=', '2')->count();
        return view('admin.staffs.staff', compact(['users', 'roles', 'total_users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'donator')->pluck('name', 'id')->all();
        return view('admin.staffs.addStaff', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $data = $this->getRequest($request);
        $data['email'] = $data['first_name'].time().'@icseo.org';
        $data['password'] = bcrypt('afghan.com');
        User::create($data);
        return redirect('user')->with('message', 'User Saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::where('name', '!=', 'donator')->pluck('name', 'id')->all();
        return view('admin.staffs.profile', compact(['user', 'roles']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        if(Auth::user()->id == $id){
            $request->validate([
                'first_name' => 'required|min:2|max:50',
                'last_name' => 'required|min:2|max:50',
                'email' => 'required|email|unique:users,email,'.$id,
                'phone_number' => 'nullable|unique:users,phone_number,'.$id,
                'password' => 'required|min:6|max:40',
                'hometown' => 'nullable|min:2|max:200',
                'current_address' => 'nullable|min:2|max:200',
                'image' => 'mimes:jpg,jpeg,png',    
            ]);
        }else{
            $request->validate([
                'first_name' => 'required|min:2|max:50',
                'last_name' => 'required|min:2|max:50',
                // 'email' => 'required|email|unique:users,email,'.$id,
                'phone_number' => 'nullable|unique:users,phone_number,'.$id,
                'hometown' => 'nullable|min:2|max:200',
                'current_address' => 'nullable|min:2|max:200',
                'image' => 'mimes:jpg,jpeg,png',    
            ]);
        }

        $data = $this->getRequest($request);

        if(Auth::user()->id == $id){
            $data['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);
        $user->update($data);
        return redirect('user')->with('message', 'User Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // User::findOrFail($id)->delete();
        // $request->session()->flash('user_deleted', 'User is Deleted');
        // return redirect('user');
    }
}
