<?php

namespace App\Http\Controllers;

use App\Models\Item;

use App\Models\User;
use App\Models\Zone;
use App\Models\Stock;
use App\Models\Requests;
use Illuminate\Http\Request;
use App\Models\TeamLeadStock;
use App\Models\RequestEngineer;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Approval;

use App\Notifications\StockRequestNotification;

class RequestEngineercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestengineers= RequestEngineer::all();
        return view('requestengineer.index',compact('requestengineers'));
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

        return view('requestengineer.create',compact('items','zones','users'));
    }
//
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

        
        $requestengineer =  new Requestengineer;
        $requestengineer->user_id=$request->user_id;
        $requestengineer->zone_id=$request->zone_id;
        $requestengineer->item_id=$request->item_id;  
        $requestengineer->quantity=$request->quantity; 
        $requestengineer->purpose=$request->purpose;
        $requestengineer->status ='pending';
        $requestengineer->save();
        $user=User::findOrFail($requestengineer->user_id);

        $user=User::where('role_id',1)->get();
        Notification::send($user,new Approval());
        return redirect()->route('requestengineer.index')->with('success','Request sent successfully');
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
        $requestengineer=RequestEngineer::findOrFail($id);
        $items=Item::all();
        $zones=Zone::all();
        $users=User::where('role_id',1)->get();
        return view('requestengineer.edit',compact('requestengineer','users','zones','items'));
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

        $requestengineer = requestengineer::findOrFail($id);
        $requestengineer->user_id=$request->user_id;
        $requestengineer->zone_id=$request->zone_id;
        $requestengineer->item_id=$request->item_id;  
        $requestengineer->quantity=$request->quantity; 
        $requestengineer->purpose=$request->purpose;
        $requestengineer->status ='pending';
        $requestengineer->save();

        return redirect()->route('requestengineer.index')->with('success','Request updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestengineer= RequestEngineer::findOrFail($id);
        $requestengineer->delete();

        return redirect()->route('requestengineer.index')->with('success','Request deleted successfully');
    }
}
