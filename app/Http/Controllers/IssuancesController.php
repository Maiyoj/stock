<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issuance;
use App\Models\Zone;
use App\Models\User;
use App\Models\Item;
use App\Models\Stock;
use App\Models\TeamLeadStock;

class IssuancesController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issuances=Issuance::all();
       
        return view('issuances.index',compact('issuances'));
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
        $users=User::where('role_id',1)->get();

        return view('issuances.create',compact('items','zones','users'));
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
        $stock=Stock::where('item_id',$request->item_id)->first();
        $available_stock=$stock->quantity;
        if($request->quantity>$available_stock)
        {
            return redirect()->back()->with('error','The available is too low for requested issuance');
        }
        $issuance = new Issuance;
        $issuance->user_id=$request->user_id;
        $issuance->zone_id=$request->zone_id;
        $issuance->item_id=$request->item_id;
        $issuance->quantity=$request->quantity;
        $issuance->purpose=$request->purpose;
        $issuance->save();

        $stock->quantity=$stock->quantity-$request->quantity;
        $stock->save();

        $team_lead=TeamLeadStock::where('user_id',$request->user_id)->where('item_id',$request->item_id)->first();
        if($team_lead!=null)
        {
            $team_lead->quantity=$team_lead->quantity+$request->quantity;
            $team_lead->save();
        }
        else{
            $new_team_lead=new TeamLeadStock;
            $new_team_lead->user_id=$request->user_id;
            $new_team_lead->item_id=$request->item_id;
            $new_team_lead->quantity=$request->quantity;
            $new_team_lead->save();
        }
        

        return redirect()->route('issuance.index')->with('success','Issuance added successfully');
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
        $issuance=Issuance::findOrFail($id);
        
        $items=Item::all();
        $zones=Zone::all();
        $users=User::where('role_id',1)->get();

        return view('issuances.edit',compact('items','zones','users','issuance'));
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
        $request->validate([
            'quantity'=>'numeric|required'
        ]);

        $issuance = Issuance::findOrFail($id);
        $original_quantity=$issuance->quantity;
        $stock=Stock::where('item_id',$request->item_id)->first();
        $available_stock=$stock->quantity;
        if($request->quantity>$available_stock)
        {
            return redirect()->back()->with('error','The available is too low for requested issuance');
        }
        $issuance->zone_id=$request->zone_id;
        $issuance->item_id=$request->item_id;
        $issuance->quantity=$request->quantity;
        $issuance->purpose=$request->purpose;
        $issuance->save();

      
        $stock->quantity=($stock->quantity+$original_quantity)-$request->quantity;
        $stock->save();
        
        $team_lead=TeamLeadStock::where('user_id',$request->user_id)->where('item_id',$request->item_id)->first();
    
            $team_lead->quantity=($team_lead->quantity-$original_quantity)+$request->quantity;
            $team_lead->save();
        
        return redirect()->route('issuance.index')->with('success','Issuance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issuance=Issuance::findOrFail($id);
        $stock=Stock::where('item_id',$issuance->item_id)->first();
        $stock->quantity=$stock->quantity+$issuance->quantity;
        $stock->save();

        $issuance->delete();
        return redirect()->route('issuance.index')->with('success','Issuance deleted successfully');

    }
}
