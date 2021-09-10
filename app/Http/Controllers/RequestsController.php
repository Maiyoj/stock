<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issuance;
use App\Models\Zone;
use App\Models\User;
use App\Models\Item;
use App\Models\Stock;
use App\Models\TeamLeadStock;
use App\Models\Requests;

class Requestscontroller extends Controller
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
        $requests=Requests::all();
        return view('request.index', compact('requests'));
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

        return view('request.create',compact('items','zones','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            'quantity'=>'numeric|required'
        ]);

        $requests =  new Requests;
        $requests->user_id=$request->user_id;
        $requests->zone_id=$request->zone_id;
        $requests->item_id=$request->item_id;
        $requests->quantity=$request->quantity;
        $requests->status ='pending';
        $requests->save();

        return redirect()->route('request.index')->with('success','Request sent successfully');
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
        $request=Requests::findOrFail($id);
        $items=Item::all();
        $zones=Zone::all();
        $users=User::where('role_id',1)->get();
        return view('request.edit',compact('request','users','zones','items'));
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

        $requests = Requests::findOrFail($id);
        $requests->user_id=$request->user_id;
        $requests->zone_id=$request->zone_id;
        $requests->item_id=$request->item_id;
        $requests->quantity=$request->quantity;
        $requests->status ='pending';
        $requests->save();

        return redirect()->route('request.index')->with('success','Request updated successfully');

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
