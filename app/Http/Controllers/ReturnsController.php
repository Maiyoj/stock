<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issuance;
use App\Models\Zone;
use App\Models\User;
use App\Models\Item;
use App\Models\Stock;
use App\Models\TeamLeadStock;
use App\Models\Returned;
use App\Models\Returns;
use App\Models\Inssuancee;

use Illuminate\Support\Facades\Auth;


class ReturnsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');


        $this->middleware('permission:returns|returns-create|returns-edit|returns-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:returns-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:returns-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:returns-delete', ['only' => ['destroy']]);


      

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returnss=Returns::where('user_id',Auth::user()->id)->get();
       
        return view('returns.index',compact('returnss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=Item::all();
        $zones=Zone::all();
        $users=User::all();

        return view('returns.create',compact('items','zones','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       $request->validate([
        'quantity'=>'numeric|required'
    ]);

    $returns = new Returns;
    $returns->user_id=$request->user_id;
    $returns->zone_id=$request->zone_id;
    $returns->item_id=$request->item_id;
    $returns->quantity=$request->quantity;
    $returns->save();





    $stock= Stock::where('item_id',$returns->item_id)->first();
    $stock->quantity=$stock->quantity+$returns->quantity;
    $stock->save();
    $team_lead =  TeamLeadStock::where('item_id',$returns->item_id)->where('user_id',Auth::user()->id)->first();
    $team_lead->quantity=$team_lead->quantity-$request->quantity;
    $team_lead->save();
   
    return redirect()->route('returns.index')->with('success', 'Returns Added Sucessfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
