<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\RequestItems;
use Illuminate\Http\Request;
use App\Models\RequestEngineer;
use App\Models\RequestEngineersItem;
use App\Models\Requests;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function editrequestitem($id)
    {
        $items = Item::all();
        $requestitem = RequestEngineersItem::findOrFail($id);
        //dd($requestitem);
        return view('requestengineer.edit_item',compact('items','requestitem'));
    }

    public function editrequest($id)
    {
        $items = Item::all();
        $requestitem = RequestItems::findOrFail($id);
        return view('request.edit_item',compact('items','requestitem'));
    }
    public function updaterequestitem($id,Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer'
        ]);
        $requestitem = RequestEngineersItem::findOrFail($id);
       // dd($requestitem);
        $requestitem->item_id = $request->item_id;
        $requestitem->quantity = $request->quantity;
        $requestitem->save();

        $request = RequestEngineer::findOrFail($requestitem->request_engineer_id);
        return redirect()->route('requestengineer.edit',$request->id)->with('success','Item updated successfully');
    }
    public function updaterequest($id,Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer'
        ]);
  
        $requestitem = RequestItems::findOrFail($id);
        $requestitem->item_id = $request->item_id;
        $requestitem->quantity = $request->quantity;
        $requestitem->save();

        $request = Requests::findOrFail($requestitem->requests_id);
        return redirect()->route('request.edit',$request->id)->with('success','Item updated successfully');
    }
    public function deleterequestitem($id)
    {
        $requestitem = RequestEngineersItem::findOrFail($id);
        $request = RequestEngineer::findOrFail($requestitem->request_engineer_id);
        $requestitem->delete();
        return redirect()->route('requestengineer.edit',$request->id)->with('success','Item deleted successfully');
    }
    public function deleterequest($id)
    {
        $requestitem = RequestItems::findOrFail($id);
        $request = Requests::findOrFail($requestitem->requests_id);
        $requestitem->delete();
        return redirect()->route('request.edit',$request->id)->with('success','Item deleted successfully');
    }
    public function addrequestitem(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer'
        ]);
        $item = new RequestEngineersItem();
        $item->request_engineer_id = $request-> request_id;
        $item->item_id = $request->item_id;
        $item->quantity = $request->quantity;
        $item->save();
        $request = RequestEngineer::findOrFail($item->request_engineer_id);
        return redirect()->route('requestengineer.edit',$request->id)->with('success','Item added successfully');

    }
    public function addrequest(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer'
        ]);
        $item = new RequestItems();
        $item->requests_id = $request-> request_id;
        $item->item_id = $request->item_id;
        $item->quantity = $request->quantity;
        $item->save();
        $request = Requests::findOrFail($item->requests_id);
        return redirect()->route('request.edit',$request->id)->with('success','Item added successfully');

    }
    public function updaterequestitems(Request $request,$id)
    {
        $requestengineer = requestengineer::findOrFail($id);
        $requestengineer->user_id=$request->user_id;
        $requestengineer->engineer_id = Auth::user()->id;
        $requestengineer->zone_id=$request->zone_id;
        $requestengineer->purpose=$request->purpose;
        $requestengineer->status ='pending';
        $requestengineer->save();

        return redirect()->route('requestengineer.index')->with('success','Request updated successfully');
    }
    public function updaterequestteam(Request $request,$id)
    {
        $request = Requests::findOrFail($id);
        $request->user_id=$request->user_id;
        $request->zone_id=$request->zone_id;
        $request->status ='pending';
        $request->save();

        return redirect()->route('request.index')->with('success','Request updated successfully');
    }
}
