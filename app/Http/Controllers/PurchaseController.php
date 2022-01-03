<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Item;
use App\Models\Vendor;
use App\Models\Stock;
use App\Models\Price;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');



        
      $this->middleware('permission:purchase-list|purchase-create|purchase-edit|purchase-delete', ['only' => ['index', 'show']]);
      $this->middleware('permission:purchase-create', ['only' => ['create', 'store']]);
      $this->middleware('permission:purchase-edit', ['only' => ['edit', 'update']]);
      $this->middleware('permission:purchase-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases=Purchase::all();

        return view('purchase.index', compact('purchases'));
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

        return view('purchase.create',compact('vendors', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase=new Purchase;
        $purchase->item_id=$request->item_id;
        $purchase->vendor_id=$request->vendor_id;
        $purchase->PO_number=$request->PO_number;
        $purchase->quantity=$request->quantity;
        $price= Price::where('item_id',$request->item_id)->first();
        $purchase->price=$request->quantity*$price->price;
        $purchase->save();

        $stock= Stock::where('item_id',$purchase->item_id)->first();
        if($stock==null)
        {
            $new_stock=new Stock;
            $new_stock->item_id=$purchase->item_id;
            $new_stock->quantity= $purchase->quantity;
            $new_stock->save();
        }
        else{
            $stock->quantity=$stock->quantity+$purchase->quantity;
            $stock->save();
        }

        return redirect()->route('purchase.index')->with('success', 'Purchase Added Sucessfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase=Purchase::findOrFail($id);
        $items=Item::all();
        return view('purchase.show',compact('purchase','items'));
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
       
        $purchase=Purchase::findOrFail($id);
        $vendors= Vendor::all();

        return view('purchase.edit',compact('vendors','items','purchase'));
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
            'quantity'=>'numeric|required',
            'PO_number'=>'required|string',
        ]);

        $purchase= Purchase::findOrFail($id);
        
        $original_quantity=$purchase->quantity;

        $purchase->item_id=$request->item_id;
        $purchase->vendor_id=$request->vendor_id;
        $purchase->PO_number=$request->PO_number;
        $purchase->quantity=$request->quantity;
        $price= Price::where('item_id',$request->item_id)->first();
        $purchase->price=$request->quantity*$price->price;
        $purchase->save();

        $stock= Stock::where('item_id',$purchase->item_id)->first();
        $stock->quantity=($stock->quantity-$original_quantity)+$purchase->quantity;
        $stock->save();

        return redirect()->route('purchase.index')->with('success', 'Purchase Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $purchase=Purchase::findOrFail($id);
        $stock=Stock::where('item_id',$purchase->item_id)->first();
        $stock->quantity=$stock->quantity-$purchase->quantity;
        $stock->save();
        $purchase->delete();
        return redirect()->route('purchase.index')->with('success', ' Purchase Deleted Successfully');
    }

    public function deleteAll(Request $request)
    { 
        $ids = $request->ids;
		Purchase::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"Items have been deleted!"]);
		 redirect()->route('item.index')->with('success', 'Item deleted successfully');
    }
}
