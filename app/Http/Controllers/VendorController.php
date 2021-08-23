<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Item;

class VendorController extends Controller
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
        $items=Item::all();
        return view('vendor.create',compact('items'));
    
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
            
            'name'=>'required|string',
            'price'=>'numeric|required',
        ]);


        $vendor=new Vendor;
        $vendor->name=$request->name;
        $vendor->item_id=$request->item_id;
        $vendor->price=$request->price;
        $vendor->save();


        return redirect()->route('vendor.index')->with('success', 'Vendor Added Sucessfully');
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
        $items=Item::all();
    
        $vendor= Vendor::findOrFail($id);

        return view('vendor.edit',compact('vendor','items'));
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
            
            'name'=>'required|string', 
            'price'=>'numeric|required'
        ]);


        $vendor=Vendor::findOrFail($id);
        $vendor->name=$request->name;
        $vendor->item_id=$request->item_id;
        $vendor->price=$request->price;
        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'Vendor Updated Sucessfully');
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
        return redirect()->route('vendor.index')->with('success', ' Vendor Deleted Successfully');
    }
}
