<?php

namespace App\Http\Controllers;

use App\Http\Requests\CauseRequest;
use App\Models\Cause;
use Illuminate\Http\Request;

class CauseController extends Controller
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
        $causes = Cause::latest()->get();
        return view('admin.extra.causes', compact('causes'));
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
    public function store(CauseRequest $request)
    {
        $data = $request->all();
        Cause::create($data);
        return redirect('causes')->with('message', 'Appeal Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cause = Cause::findOrFail($id);
        $cause->delete();
        return Redirect()->back()->with('message', 'Contract Deleted Successfully!');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $causes = Cause::findOrFail($id);
        return view('admin.extra.causesEdit', compact('causes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CauseRequest $request, $id)
    {
        
        $data = $request->all();
        $causes = Cause::findOrFail($id);
        $causes->update($data);
        return redirect('causes')->with('message', 'Appeal Updated!');
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
