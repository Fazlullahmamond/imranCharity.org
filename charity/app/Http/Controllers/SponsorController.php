<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use App\Models\NeedyPeople;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class SponsorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsSponsor']);
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
            $data['image'] = $image_name;
        }
        return $data;
    }
    
    public function index(){
        $donates = Donate::where('user_id', Auth::user()->id)->orderBy('donation_date', 'desc')->get();
        return view('sponsor.index', compact('donates'));
    }

    public function show($id){
        $needy = NeedyPeople::findOrFail($id);
        return view('sponsor.show_needy', compact('needy'));
    }

    public function create(){
        return view('sponsor.edit');
    }

    public function update(Request $request, $id){

        $request->validate([
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'date_birth' => 'nullable|date',
            'hometown' => 'nullable|min:2|max:100',
            'current_address' => 'nullable|min:2|max:100',
            'gender' => 'required|max:2|min:0',
            'description' => 'nullable|min:2|max:250',
            'image' => 'mimes:png,jpg,jpeg',
        ]);

        $sponsor = User::findOrFail(Auth::user()->id);
        $data = $this->getRequest($request);
        $sponsor->update($data);

        return redirect()->back()->with('message', 'information updated successfully!');
    }

    
    

    public function update_password(Request $request){
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:6|max:30',
            'confirm_password' => 'required_with:new_password|same:new_password|min:6|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('change_password', 'something is not working!');
        } else {
            $sponsor = User::findOrFail(Auth::user()->id);
            $sponsor->update(['password' => Hash::make($request->new_password)]);
            return redirect()->back()->with('message', 'Password updated successfully!');    
        }
    }
}
