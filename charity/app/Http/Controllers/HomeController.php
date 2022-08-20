<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cause;
use App\Models\NeedyPeople;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin/index');
    }

}
