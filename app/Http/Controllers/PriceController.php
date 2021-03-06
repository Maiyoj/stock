<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Vendor;
use App\Models\Price;


class PriceController extends Controller
{

    
    public function __construct()
    {

        $this->middleware('auth');

        $this->middleware('permission:price|price|price|price', ['only' => ['index', 'show']]);
        $this->middleware('permission:price', ['only' => ['create', 'store']]);
        $this->middleware('permission:price', ['only' => ['edit', 'update']]);
        $this->middleware('permission:price', ['only' => ['destroy']]);


    }
    /**
     * 
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices=Price::all();

        return view('price.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=Item::all();
        $vendors=vendor::all();


        return view('price.create',compact('vendors', 'items'));
    
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
            
        ]);


        $price=new Price;
        $price->vendor_id=$request->vendor_id;
        $price->item_id=$request->item_id;
        $price->price=$request->price;

        $price->save();


        return redirect()->route('price.index')->with('success', 'Price Added Sucessfully');
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
        $price=Price::findOrFail($id);
        $vendors= Vendor::all();

        return view('price.edit',compact('vendors','items','price'));
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
            
            
        
        ]);


        $price=Price::findOrFail($id);
        $price->vendor_id=$request->vendor_id;
        $price->item_id=$request->item_id;
        $price->price=$request->price;
        
    
        $price->save();

        return redirect()->route('price.index')->with('success', 'Price Updated Sucessfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price=Price::findOrFail($id);
        $price->delete();
        return redirect()->route('price.index')->with('success', ' Price Deleted Successfully');
    }


    
    public function deleteAll(Request $request)
    { 
        $ids = $request->ids;
		Price::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"Items have been deleted!"]);
		 redirect()->route('item.index')->with('success', 'Item deleted successfully');
    }

}
