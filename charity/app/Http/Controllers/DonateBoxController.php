<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationBoxRequest;
use App\Models\DonationBox;
use App\Models\User;
use Illuminate\Http\Request;

class DonateBoxController extends Controller
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
        // do search or show the recodes
        $donationBoxes = DonationBox::where(function ($query) use ($request) {
            if (($term = $request->get('term'))) {
                $keyword = '%' . $term . '%';
                $query->orWhere('name', 'Like', $keyword);
                $query->orWhere('location', 'Like', $keyword);
            }
        })->paginate(10);
        return view('admin.donationBox.donationBox', compact('donationBoxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('first_name', 'id')->all();
        return view('admin.donationBox.addDonationBox', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationBoxRequest $request)
    {

        DonationBox::create($request->all());
        return redirect('donateBox')->with('message', 'Donation Box saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donationBox = DonationBox::find($id);
        $donationBox->delete();
        return Redirect()->back()->with('message', 'Donation Box Deleted!');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donationBox = DonationBox::find($id);
        $users = User::pluck('first_name', 'id')->all();
        return view('admin.donationBox.editDonationBox', compact(['donationBox', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonationBoxRequest $request, $id)
    {
        //
        $donationBox = DonationBox::findOrFail($id);
        $donationBox->update($request->all());
        return redirect('donateBox')->with('message', 'Donation Box Updated!');
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
