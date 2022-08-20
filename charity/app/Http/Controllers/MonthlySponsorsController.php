<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonthlySponsorRequest;
use Illuminate\Http\Request;
use App\Models\MonthlySponsor;
use App\Models\Donator;
use App\Models\NeedyPeople;
use App\Models\User;

class MonthlySponsorsController extends Controller
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
        $monthly_sponsors = MonthlySponsor::where(function($query) use ($request){
            if(($term = $request->get('term'))){
                $keyword = '%' . $term . '%';
                $query->orWhere('monthly_amount', 'Like', $keyword);
                $query->orWhere('description', 'Like', $keyword);
                $query->orWhere('duration', 'Like', $keyword);
            }
        })->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.sponsors.monthly.monthlySponsor', compact('monthly_sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donator = User::where('role_id',2)->pluck('first_name', 'id')->all();
        $needy_people = NeedyPeople::pluck('first_name','id')->all();
        return view('admin.sponsors.monthly.addMonthlySponsor', compact(['donator','needy_people']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonthlySponsorRequest $request)
    {
        MonthlySponsor::create($request->all());
        return redirect('monthly_sponsors')->with('message', 'Monthly Sponsor Add!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // this method will as delete function
    public function show($id)
    {
        $monthly_sponsor = MonthlySponsor::findOrFail($id);
        $monthly_sponsor->delete();   
        return Redirect()->back()->with('message', 'Monthly Sponsor Deleted!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monthly_sponsor = MonthlySponsor::findOrFail($id);
        $donator = User::where('role_id',2)->pluck('first_name', 'id')->all();
        $needy_people = NeedyPeople::pluck('first_name','id')->all();
        return view('admin.sponsors.monthly.editMonthlySponsor', compact(['monthly_sponsor', 'donator','needy_people' ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MonthlySponsorRequest $request, $id)
    {
        $monthly_sponsor = MonthlySponsor::findOrFail($id);
        $monthly_sponsor->update($request->all());
        return redirect('monthly_sponsors')->with('message', 'Monthly Sponsor Updated!');
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
