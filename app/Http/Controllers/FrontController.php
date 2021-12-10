<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\TeamLeadStock;
use App\Models\RequestEngineer;
class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index(){

        $stocks=RequestEngineer::all();
        return view('home.index', compact('stocks'));

    }
}
