<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issuance;
use App\Models\Zone;
use App\Models\User;
use App\Models\Item;
use App\Models\Stock;
use App\Models\Comments;
use App\Models\TeamLeadStock;
use App\Models\Requests;
use App\Notifications\StockRequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Approval;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');


        $this->middleware('permission:request|request|requst|request', ['only' => ['index', 'show']]);
        $this->middleware('permission:request', ['only' => ['create', 'store']]);
        // $this->middleware('permission:request-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:request', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users=User::where('id',Auth::user()->id)->get();
        $requests= Requests::where('teamlead_id',Auth::user()->id)->where('draft',1)->get();
        return view('request.index',compact('requests', 'users'));
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
        $requests->teamlead_id= Auth::user()->id;
        $requests->zone_id=$request->zone_id;
        $requests->item_id=$request->item_id;
        $requests->quantity=$request->quantity;
        $requests->status ='pending';
        $requests->save();
        
       
        return redirect()->route('request.drafts')->with('success','Draft added successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request=Requests::findOrFail($id);
        $items=Item::all();
        $comment=Comments::where('requests_id',$request->id)->get();;
       
      
        return view('request.show',compact('request','items', 'comment'));
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
        $users=User::where('id',Auth::user()->id)->get();
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
        $requests->teamlead_id= Auth::user()->id;
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
        $request= Requests::findOrFail($id);
        $request->delete();

        return redirect()->route('request.index')->with('success','Request deleted successfully');
    }

    public function drafts(Request $request)
    {
       
       $users=User::where('id',Auth::user()->id)->get();
        $requests= Requests::where('teamlead_id',Auth::user()->id)->where('draft',0)->get();
        return view('request.drafts',compact('requests'));
    }
    


}
