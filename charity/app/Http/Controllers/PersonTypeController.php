<?php

namespace App\Http\Controllers;

use App\Http\Requests\NameRequest;
use App\Models\PersonType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PersonTypeController extends Controller
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
        $person_types = PersonType::all();
        return view('admin.extra.personTypes', compact('person_types'));
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
    public function store(NameRequest $request)
    {
        
        $date = $request->all();
        PersonType::create($date);
        return Redirect()->back()->with('message', 'Person Type Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person_types = PersonType::all();
        $person_type = PersonType::findOrFail($id);
        return view('admin.extra.personTypes', compact(['person_types', 'person_type']));
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
}
