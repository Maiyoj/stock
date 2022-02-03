<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\TeamLeadStock;
use App\Models\Issuancee;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');


        
      $this->middleware('permission:team|team|team|team', ['only' => ['index', 'show']]);
      $this->middleware('permission:stock|stock|stocks|stocks', ['only' => ['index', 'show']]);
      #$this->middleware('permission:team-list|team-create|team-edit|team-delete', ['only' => ['index', 'show']]);
    }
    public function index()
    {
        $stocks= Stock::all();
        return view('stocks.index',compact('stocks'));
    }
    public function teamleadstocks()
    {
        
        #$stocks=TeamLeadStock::where('user_id',Auth::user()->id)->get();
        if (Auth::check())
        {
            
             $stocks=TeamLeadStock::where('user_id',Auth::user()->id)->get();
             return view('stocks.teamleadstocks',compact('stocks'));
        }
       /* $stocks=TeamLeadStock::where('id', Auth::id())->get();
         return view('stocks.teamleadstocks',compact('stocks'));*/

         
    }
    public function engineerstocks()
    {
        $stocks=Issuancee::where('user_id',Auth::user()->id)->get();
        return view('stocks.engineer',compact('stocks'));
    }

    
}
