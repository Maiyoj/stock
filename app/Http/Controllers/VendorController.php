<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Vendor;

class VendorController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');


        $this->middleware('permission:vendor|vendor|vendor|vendor', ['only' => ['index', 'show']]);
        $this->middleware('permission:vendor', ['only' => ['create', 'store']]);
        $this->middleware('permission:vendor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:vendor', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=Vendor::all();

        return view('vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
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
            
            'name'=>'required|string|unique:vendors',
            'email'=>'required|string|unique:vendors',
            'title'=>'required|string',
            'number'=>'required|string',
            
        ]);

        $vendor = Vendor::where('name',$request->name)->first();
        if ($vendor!=null) {
            $vendor->title=$request->title;
            $vendor->name=$request->name;
            $vendor->email=$request->email;
            $vendor->number=$request->number;
            $vendor->address=$request->address;
            $vendor->country=$request->country;
            $vendor->deleted_at = null;
            $vendor->save();
        } else {
            $vendor=new Vendor;
            $vendor->title=$request->title;
            $vendor->name=$request->name;
            $vendor->email=$request->email;
            $vendor->number=$request->number;
            $vendor->address=$request->address;
            $vendor->country=$request->country;
            $vendor->save();
        }
        
       

        return redirect()->route('vendor.index')->with('success', 'Vendor added sucessfully');

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
        
        $vendor= Vendor::findOrFail($id);

        return view('vendor.edit',compact('vendor'));
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
            
            'name'=>'required|string|unique:vendors',
            'email'=>'required|string|unique:vendors',
            'title'=>'required|string',
            'number'=>'required|string',
        ]);


        $vendor=Vendor::findOrFail($id);
        $vendor->title=$request->title;
        $vendor->name=$request->name;
        $vendor->email=$request->email;
        $vendor->number=$request->number;
        $vendor->address=$request->address;
        $vendor->country=$request->country;
        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'Vendor Updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $vendor=Vendor::findOrFail($id);
        $vendor->delete();
        return redirect()->route('vendor.index')->with('success', 'Vendor deleted success');
    
    }

    public function All(Request $request)
    { 
        $ids = $request->ids;
		Vendor::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"Items have been deleted!"]);
		# redirect()->route('item.index')->with('success', 'Item deleted successfully');
    }
}
