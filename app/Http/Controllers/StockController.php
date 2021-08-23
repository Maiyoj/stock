<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\TeamLeadStock;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    public function index()
    {
        $stocks= Stock::all();
        return view('stocks.index',compact('stocks'));
    }
    public function teamleadstocks()
    {
        $stocks=TeamLeadStock::where('user_id',Auth::user()->id)->get();
         return view('stocks.teamleadstocks',compact('stocks'));
    }
    public function engineer()
    {
        $stocks=Issuancee::where('user_id',Auth::user()->id)->get();
        return view('stocks.engineer',compact('stocks'));
    }
}
