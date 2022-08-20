<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
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
        $contracts = Contract::all();
        return view('admin.contract.contract_list', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contract.contract');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {
        $data = $request->all();
        Contract::create($data);
        return redirect('contract')->with('message', 'Contract Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();
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
        $contract = Contract::findOrFail($id);
        return view('admin.contract.contract_edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContractRequest $request, $id)
    {
        $data = $request->all();
        $contract = Contract::findOrFail($id);
        $contract->update($data);
        return redirect('contract')->with('message', 'Contract Updated!');
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
