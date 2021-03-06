<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Zone;
class ZoneController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('permission:zone|zone|zone|zone', ['only' => ['index', 'show']]);
        $this->middleware('permission:zone', ['only' => ['create', 'store']]);
        $this->middleware('permission:zone', ['only' => ['edit', 'update']]);
        $this->middleware('permission:zone', ['only' => ['destroy']]);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones=zone::all();

        return view('zone.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('zone.create',compact('users'));
    
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
            
            'zone'=>'required|string|unique:zones',
            
        ]);

        $zone = Zone::where('zone',$request->zone)->first();
        if ($zone!=null) {
            $zone->zone=$request->zone;
            $zone->user_id=$request->user_id;
            $zone->deleted_at = null;
            $zone->save();
        } else {
            $zone=new Zone;
            $zone->user_id=$request->user_id;
            $zone->zone=$request->zone;
            $zone->save();
        }
        
        return redirect()->route('zone.index')->with('success', 'Zone Added Sucessfully');
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
        $users=User::all();
    
        $zone= Zone::findOrFail($id);

        return view('zone.edit',compact('zone','users'));
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
            
            'zone'=>'required|string', 
        
        ]);


        $zone=Zone::findOrFail($id);
        $zone->user_id=$request->user_id;
        $zone->zone=$request->zone;
        
    
        $zone->save();

        return redirect()->route('zone.index')->with('success', 'Zone Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        $zone=Zone::findOrFail($id);
        $zone->delete();
        return redirect()->route('zone.index')->with('success', ' Zone Deleted Successfully');
    }

     
    public function deleteAll(Request $request)
    { 
        $ids = $request->ids;
		Zone::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"Items have been deleted!"]);
		 redirect()->route('item.index')->with('success', 'Item deleted successfully');
    }

}

