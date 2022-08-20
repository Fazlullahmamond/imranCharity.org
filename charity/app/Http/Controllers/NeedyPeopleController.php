<?php

namespace App\Http\Controllers;

use App\Http\Requests\NeedyRequest;
use App\Models\NeedyPeople;
use App\Models\PersonType;
use App\Models\User;
use App\Models\Relationship;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NeedyPeopleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'IsAdmin']);
    }
    
    private $limit = 10;

    private function getRequest(needyRequest $request)
    {

        $data = $request->all();
        
        if ($file = $request->file('image')) {
            $old_image = $request->old_image;
            if($old_image != 'backend/img/needy/needy.jpg'){
                unlink($old_image);
            }
            $image_name = $request->first_name . time() .'.'. $file->getClientOriginalExtension();
            $file->move('backend/img/needy/', $image_name);
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
        $needy_people = NeedyPeople::where(function ($query) use ($request) {

            if ($person_type_id = ($request->get('person_type_id'))) {
                $query->where('person_type_id', $person_type_id);
            }

            if (($term = $request->get('term'))) {
                $keyword = '%' . $term . '%';
                $query->orWhere('first_name', 'Like', $keyword);
                $query->orWhere('last_name', 'Like', $keyword);
                $query->orWhere('needy_percentage', 'Like', $keyword);
            }
        })->orderBy('needy_percentage', 'desc')->paginate($this->limit);
        return view('admin.needy.needy', compact('needy_people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = User::pluck('first_name', 'id')->all();
        $person_types = PersonType::pluck('name', 'id')->all();
        return  view('admin.needy.addNeedy', compact(['staff', 'person_types']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NeedyRequest $request)
    {

        $data = $this->getRequest($request);
        NeedyPeople::create($data);
        return redirect('needy')->with('message', 'Needy Person Add!');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $needy = NeedyPeople::findOrFail($id);
        $staff = User::pluck('first_name', 'id')->all();
        $person_types = PersonType::pluck('name', 'id')->all();
        $relationship = Relationship::pluck('name', 'id')->all();
        return view('admin.needy.showNeedy', compact(['needy', 'staff', 'person_types', 'relationship']));
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
    public function update(NeedyRequest $request, $id)
    {
        $data = $this->getRequest($request);
        $needy = NeedyPeople::findOrFail($id);
        $needy->update($data);
        return redirect('needy')->with('message', 'Needy is Updated!');
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
