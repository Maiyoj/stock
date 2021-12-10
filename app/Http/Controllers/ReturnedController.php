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
use Illuminate\Support\Facades\Auth;

class ReturnedController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth');
       
        $this->middleware('permission:ereturns-list|ereturns-create|ereturns-edit|ereturns-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:ereturns-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ereturns-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ereturns-delete', ['only' => ['destroy']]);



    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returneds=Returned::here('user_id',Auth::user()->id)->get();
       
        return view('returned.index',compact('returneds'));
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

        return view('returned.create',compact('items','zones','users'));
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

        $returned = new Returned;
        $returned->user_id=$request->user_id;
        $returned->zone_id=$request->zone_id;
        $returned->item_id=$request->item_id;
        $returned->quantity=$request->quantity;
        $returned->save();
        $teamleadstock= TeamLeadStock::where('item_id',$returned->item_id)->where('user_id',$request->user_id)->first();
    
    $teamleadstock->quantity=$teamleadstock->quantity+$returned->quantity;
    $teamleadstock->save();
            return redirect()->route('returned.index')->with('success', 'Returns Added Sucessfully');
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
