<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Donate;
use App\Models\DonationSubtype;
use App\Models\DonationType;
use App\Models\NeedyPeople;
use App\Models\PersonType;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
    public function index()
    {
        $roles = Role::all();
        $person_types = PersonType::all();
        $needy_people = NeedyPeople::all();
        $donates = Donate::all();
        $donates_types = DonationType::all();
        $donates_this_year = Donate::whereYear('donation_date', date('Y'))->count();
        $donates_this_year = Donate::whereYear('donation_date', date('Y'))->count();
        $donates_last_year = Donate::whereYear('donation_date', date('Y')-1)->count();
        $total_contracts = Contract::count();


        //getting all months donations and counting it--------------------------------
        $months_data = [];
        $keys = [];
        $values = Donate::select('donation_date')->whereYear('donation_date', date('Y'))->get()->groupBy(function($data){
            return Carbon::parse($data->donation_date)->format('m');
        });
        foreach ($values as $key => $value){
            $keys[ (int) $key-1] = count($value);
        }

        for($i = 0; $i < 12; $i++){
            if(!empty($keys[$i])){
                $months_data[$i] = $keys[$i];
            }else{
                $months_data[$i] = 0;
            }
        }

        return view('admin.index', compact(['roles', 'person_types', 'needy_people', 'donates', 'donates_this_year', 'donates_last_year', 'months_data', 'keys', 'values', 'total_contracts', 'donates_types']));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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

    public function profile()
    {
        return view('admin.profile');
    }

}
