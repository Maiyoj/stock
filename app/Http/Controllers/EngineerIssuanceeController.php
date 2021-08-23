<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Zone;
use App\Models\Stock;
use App\Models\Issuancee;
use App\Models\User;
use App\Models\TeamLeadStock;
use Illuminate\Support\Facades\Auth;


class EngineerIssuanceeController extends Controller
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
        $issuancees=Issuancee::all();
        return view('issuancee.index', compact('issuancees'));
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
        return view('engineer_issuancee.create', compact('items','zones','users'));
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
            'quantity'=>'numeric|required',
            'purpose'=>'string|required'
        ]);
       $stock=TeamLeadStock::where('user_id',$request->user_id)->where('item_id',$request->item_id)->first();
        $available_stock=$stock->quantity;
        if($request->quantity>$available_stock)
       {
           return redirect()->back()->with('error','The available is too low for requested issuance');
        }
        $issuancee = new Issuancee;
        $issuancee->user_id=Auth::user()->id;
        $issuancee->zone_id=$request->zone_id;
        $issuancee->item_id=$request->item_id;
        $issuancee->quantity=$request->quantity;
        $issuancee->purpose=$request->purpose;
        $issuancee->save();

        $stock->quantity=$stock->quantity-$request->quantity;
        $stock->save();


        return redirect()->route('myissuancee.index')->with('success','Issuance added successfully');
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
        $issuancee=Issuancee::findOrFail($id);
        
        $items=Item::all();
        $zones=Zone::all();
        $users=User::where('role_id',1)->get();

        return view('myissuancee.edit',compact('items','zones','users','issuancee'));
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
            'quantity'=>'numeric|required',
            'purpose'=>'string|required'
        ]);

        $issuancee = Issuancee::findOrFail($id);
        $original_quantity=$issuancee->quantity;
        $stock=TeamLeadStock::where('user_id',$request->id)->where('item_id',$request->item_id)->first();
        $available_stock=$stock->quantity;
        if($request->quantity>$available_stock)
        {
            return redirect()->back()->with('error','The available is too low for requested issuance');
        }
        $issuancee->zone_id=$request->zone_id;
        $issuancee->item_id=$request->item_id;
        $issuancee->quantity=$request->quantity;
        $issuancee->purpose=$request->purpose;
        $issuancee->save();

      
        $stock->quantity=($stock->quantity+$original_quantity)-$request->quantity;
        $stock->save();
        
        return redirect()->route('engineer_issuancee.index')->with('success','Issuance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issuancee=Issuancee::findOrFail($id);
        $stock=TeamLeadStock::where('user_id',Auth::user()->id)->where('item_id',$issuancee->item_id)->first();
        $stock->quantity=$stock->quantity+$issuancee->quantity;
        $stock->save();

        $issuancee->delete();
        return redirect()->route('issuancee.index')->with('success','Issuance deleted successfully');

    
    }
}
