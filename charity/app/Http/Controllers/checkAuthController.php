<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class checkAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function __invoke()
    {
        if(Auth::user()->role->name == 'admin'){
            return redirect('admin');
        }elseif(Auth::user()->role->name == 'donator'){
            return redirect('sponsor');
        }   
    }
}
