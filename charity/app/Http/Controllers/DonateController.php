<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonateRequest;
use App\Http\Requests\UserRequest;
use App\Models\Donate;
use App\Models\DonationBox;
use App\Models\DonationType;
use App\Models\NeedyPeople;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DonateController extends Controller
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
        $donates = Donate::where(function($query) use ($request){
            if($term = $request->get('term')){
                $keyword = '%' . $term .'%';
                $query->orWhere('donation_location', 'Like', $keyword);
            }
        })->orderBy('donation_date', 'desc')->paginate(7);
        return view('admin.donates.donates', compact('donates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donators = User::where('role_id',2)->pluck('first_name', 'id')->all();
        $donation_types = DonationType::pluck('name', 'id')->all();
        $donation_boxes = DonationBox::pluck('name', 'id')->all();
        $needy_people = NeedyPeople::pluck('first_name', 'id')->all();
        return view('admin.donates.addDonate', compact(['donators', 'donation_types', 'needy_people', 'donation_boxes']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonateRequest $request)
    {
        Donate::create($request->all());
        // return $request->all();
        return redirect('donate')->with('message', 'Donate added Successfully!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donate = Donate::findOrFail($id);
        $donate->delete();
        return Redirect()->back()->with('message', 'Donate Deleted Successfully!');      


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donate = Donate::findOrFail($id);
        $donators = User::where('role_id',2)->pluck('first_name', 'id')->all();
        $donation_types = DonationType::pluck('name', 'id')->all();
        $donation_boxes = DonationBox::pluck('name', 'id')->all();
        $needy_people = NeedyPeople::pluck('first_name', 'id')->all();
        return view('admin.donates.editDonate', compact(['donators', 'donation_types', 'needy_people', 'donation_boxes', 'donate']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonateRequest $request, $id)
    {
        $date = $request->all();
        $donate = Donate::findOrFail($id);
        $donate->update($date);
        return redirect('donate')->with('message', 'Donate Updated Successfully!');      
        
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
