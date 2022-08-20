<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamilyMemberRequest;
use App\Models\FamilyMember;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FamilyMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $family_members = FamilyMember::where(function ($query) use ($request){
                if($relationship_id = $request->get('relationship_id')){
                $query->where('relationship_id', $relationship_id);
                };
                if($term =  $request->get('term')){
                    $keyword = '%' . $term . '%';
                    $query->orWhere('first_name', 'Like', $keyword);
                    $query->orWhere('last_name', 'Like', $keyword);
                    $query->orWhere('phone_number', 'Like', $keyword);
                };
        })->paginate(10);
        return view('admin.needy.needy_family_member', compact('family_members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyMemberRequest $request)
    {
        $data = $request->all();
        if($file = $request->file('image')){
            $image = $request->first_name . time() . '.' . $file->getClientOriginalExtension();
            $file->move('backend/img/family_member/', $image);
            $data['image'] = $image;
        }
        FamilyMember::create($data);
        // $needy = NeedyPeople::findOrFail();
        return Redirect()->back()->with('message', 'family Member Added');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = FamilyMember::findOrFail($id);
        return view('admin.needy.editFamily_member', compact(['member']));
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
    public function update(FamilyMemberRequest $request, $id)
    {
        $data = $request->all();
        if ($file = $request->file('image')) {
            $old_image = $request->old_image;
            if($old_image != 'backend/img/family_member/family_member.jpg'){
                unlink($old_image);
            }
            $image_name = $request->first_name . time() .'.'. $file->getClientOriginalExtension();
            $file->move('backend/img/family_member/', $image_name);
            // $image_path = Storage::disk('public')->putFile('backend/img/users', $request->file('image'));
            $data['image'] = $image_name;
        }

        $data['email_verified_at'] = Carbon::now();
        $data['phone_verified_at'] = Carbon::now();
        $member = FamilyMember::findOrFail($id);
        $member->update($data);
        // $needy = NeedyPeople::findOrFail();
        return Redirect('needy')->with('message', 'family Member Updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $member = FamilyMember::findOrFail($id);
        if($member->image != 'backend/img/family_member/family_member.jpg'){
            unlink($member->image);
        }
        $member->forceDelete();
        return redirect()->back()->with('message', 'Family Member Deleted!');
    } //
    }

