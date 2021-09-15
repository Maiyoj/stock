<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
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
        $items=Item::all();
      

        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
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
            
            'name'=>'required|string|unique:items'
        ]);


        $item=new Item;
        $item->type=$request->type;
        $item->name=$request->name;
        $item->description=$request->description;
        $item->units=$request->units;
        $item->threshold=$request->threshold;
        $item->sku=$request->sku;
        $item->save();

        return redirect()->route('item.index')->with('success', 'Item added sucessfully');

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
    

        $item= Item::findOrFail($id);

        return view('item.edit',compact('item'));
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
            
            'name'=>'required|string'
        ]);


        $item=Item::findOrFail($id);
        $item->type=$request->type;
        $item->name=$request->name;
        $item->description=$request->description;
        $item->units=$request->units;
        $item->threshold=$request->threshold;
        $item->sku=$request->sku;
        $item->save();

        return redirect()->route('item.index')->with('success', 'Item Updated sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::findOrFail($id);
        $item->delete();
        return redirect()->route('item.index')->with('success', 'Item deleted success');
    }

  

}
