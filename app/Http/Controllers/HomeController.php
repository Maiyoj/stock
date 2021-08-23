<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Issuancee;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id==2)
        {
            $stocks=Issuancee::where('user_id',Auth::user()->id)->get();
            return view('stocks.engineer',compact('stocks'));
        }
        $stocks=Issuancee::all();
        return view('admin.index',compact('stocks'));
    }
}
