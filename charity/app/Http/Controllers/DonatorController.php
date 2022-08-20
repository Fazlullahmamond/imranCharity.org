<?php

namespace App\Http\Controllers;

use App\Http\Requests\SponsorRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonatorController extends Controller
{public function __construct()
    {
        $this->middleware(['auth', 'IsAdmin']);
    }

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
        //
        $sponsors = User::where(function($query) use ($request){
            if($term = $request->get('term')){
                $keyword = '%' . $term . '%';
                $query->orWhere('first_name', 'Like', $keyword);
                $query->orWhere('last_name', 'Like', $keyword);
                $query->orWhere('email', 'Like', $keyword);
                $query->orWhere('phone_number', 'Like', $keyword);
            }
        })->where('role_id', 2)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.sponsors.normal.sponsors', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.sponsors.normal.addSponsor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponsorRequest $request)
    {
        $data = $this->getRequest($request);
        $data['email'] = $data['first_name'].time().'@icseo.org';
        $data['password'] = bcrypt('afghan.com');
        $data['role_id'] = '2';
        User::create($data);
        return redirect('donator')->with('message', 'Sponsor add!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponsor = User::findOrFail($id);
        return view('admin.sponsors.normal.showSponsor', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            'first_name' => 'required|min:3|max:45',
            'last_name' => 'required|min:3|max:45',
            'status' => 'required|max:1|min:0',
            'gender' => 'required|max:2|min:0',
            'image' => 'mimes:png,jpg,jpeg',
            // 'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $sponsor = User::findOrFail($id);
        $data = $this->getRequest($request);
        $sponsor->update($data);
        return redirect('donator')->with('message', 'Sponsor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
