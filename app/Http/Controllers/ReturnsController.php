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


class ReturnsController extends Controller
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
        $returnss=Returns::all();
       
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
        $users=User::where('role_id',1)->get();

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
    $teamleadstock= TeamLeadStock::where('item_id',$returns->item_id)->where('user_id',$request->user_id)->first();
    
    $teamleadstock->quantity=$teamleadstock->quantity+$returns->quantity;
    $teamleadstock->save();
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
