<?php

namespace App\Http\Controllers;

use PDF;
use Spatie\Permission\Models\Role;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\Zone;
use App\Models\Price;
use App\Models\Stock;
use App\Models\Vendor;
use App\Models\Returns;
use App\Models\Issuance;
use App\Models\Purchase;
use App\Models\Requests;
use App\Models\Returned;
use App\Models\Issuancee;
use App\Models\ItemReports;
use App\Models\PurchaseItem;
use App\Models\RequestItems;
use Illuminate\Http\Request;
use App\Models\TeamLeadStock;
use App\Models\RequestEngineer;
use App\Notifications\Approval;
use App\Models\RequentEngineerItems;
use App\Models\RequestEngineersItem;
use App\Models\Comments;
use App\Models\EngineerComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
      
}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       //displaying of engineer reuested item
        /*if(Auth::user()->role_id==2)
        {
            $stocks=RequestEngineer::where('user_id',Auth::user()->id)->get();
            return view('stocks.engineer',compact('stocks'));
        }*/

        if (Auth::user()->hasRole('Admin')){
        //dispaly of items count on dashboard
        $stocks=RequestEngineer::all();
        $vendors=Vendor::count();
        $purchases=Purchase::count();
        $stock_items=Stock::count();
        $requests=Requests::count();
        return view('admin.index',compact('stocks','vendors','purchases','stock_items','requests'));
    }
else{
   $stocks=RequestEngineer::all();
return view('home.index', compact('stocks'));
}

       
   

}


    
 #reports controllers begin here

 public function itemreport(Request $request)
 {
    $items=Item::all();
    
    $requests=null;
    $_from=$request->from;
    $_to=$request->to;

    if($request->from!=null && $request->from!=null)
       {
          $from=Carbon::createFromFormat('Y-m-d',$request->from);
            $to=Carbon::createFromFormat('Y-m-d',$request->to);
          $items=Item::whereBetween('created_at', [$from, $to])->get();
    }
    else{
         $items=Item::all();
     }

      if($request->print=='yes')
     {
        $name='Items.pdf';
        $pdf = PDF::loadView('reports.item_PDF', ['items'=>$items,'_to'=>$_to,'_from'=>$_from]);
        return $pdf->download($name);
     }
     return view('reports.itemreport',compact('items','_from','_to'));
    
 }
 
 public function vendorreport(Request $request)
 {
    $vendors=Vendor::all();
    
    $requests=null;
    $_from=$request->from;
    $_to=$request->to;

    if($request->from!=null && $request->from!=null)
       {
$from=Carbon::createFromFormat('Y-m-d',$request->from);
  $to=Carbon::createFromFormat('Y-m-d',$request->to);
$vendors=Vendor::whereBetween('created_at', [$from, $to])->get();
    }
    else{
         $requests=Vendor::all();
     }

     if($request->print=='yes')
     {
        $name='Vendors.pdf';
        $pdf = PDF::loadView('reports.vendor_PDF', ['vendors'=>$vendors,'_to'=>$_to,'_from'=>$_from]);
        return $pdf->download($name);
     }
     return view('reports.vendorreport',compact('vendors','_from','_to'));
    
 }


 public function pricereport(Request $request)
 {
    $prices=Price::all();
    $vendors=Vendor::all();
    $item=Item::all();
    
    $requests=null;
    $_from=$request->from;
    $_to=$request->to;

    if($request->from!=null && $request->from!=null)
       {
$from=Carbon::createFromFormat('Y-m-d',$request->from);
  $to=Carbon::createFromFormat('Y-m-d',$request->to);
$prices=Price::whereBetween('created_at', [$from, $to])->get();
    }
    else{
         $prices=Price::all();
     }

     if($request->print=='yes')
     {
        $name='Prices.pdf';
        $pdf = PDF::loadView('reports.price_PDF', ['prices'=>$prices,'_to'=>$_to,'_from'=>$_from]);
        return $pdf->download($name);
     }
     return view('reports.pricereport',compact('prices','_from','_to', 'item', 'vendors'));
    
 }
 public function purchasereport(Request $request)
 {
    $prices=Price::all();
    $vendors=Vendor::all();
    $item=Item::all();
    $purchases=Purchase::all();
    
    $requests=null;
    $_from=$request->from;
    $_to=$request->to;

    if($request->from!=null && $request->to!=null)
    {
          $from=Carbon::createFromFormat('Y-m-d',$request->from);
            $to=Carbon::createFromFormat('Y-m-d',$request->to);
          $purchases=Purchase::whereBetween('created_at', [$from, $to])->get();
    }
    else{
         $purchases=Purchase::all();
     }
     if($request->print=='yes')
     {
        $name='Purchases.pdf';
        $pdf = PDF::loadView('reports.purchases_PDF', ['purchases'=>$purchases,'_to'=>$_to,'_from'=>$_from]);
        return $pdf->download($name);
     }
     return view('reports.purchasereport',compact('prices','_from','_to', 'item', 'vendors', 'purchases'));
    
 }



 public function zonereport(Request $request)
 {
    $zones=Zone::all();
    $users=User::all();
    
    $requests=null;
    $_from=$request->from;
    $_to=$request->to;

    if($request->from!=null && $request->from!=null)
       {
$from=Carbon::createFromFormat('Y-m-d',$request->from);
  $to=Carbon::createFromFormat('Y-m-d',$request->to);
$zones=Zone::whereBetween('created_at', [$from, $to])->get();
    }
    else{
         $zones=Zone::all();
     }
     if($request->print=='yes')
     {
        $name='Zones.pdf';
        $pdf = PDF::loadView('reports.zone_PDF', ['zones'=>$zones,'_to'=>$_to,'_from'=>$_from]);
        return $pdf->download($name);
     }
     return view('reports.zonereport',compact('zones','_from','_to', 'users'));
    
 }
 
 public function issuancereport(Request $request)
 {
    $zones=Zone::all();
    $users=User::all();
    $items=Item::all();
    $issuances=Issuance::all();


    $requests=null;
    $_from=$request->from;
    $_to=$request->to;

    if($request->from!=null && $request->from!=null)
       {
$from=Carbon::createFromFormat('Y-m-d',$request->from);
  $to=Carbon::createFromFormat('Y-m-d',$request->to);
$issuances=Issuance::whereBetween('created_at', [$from, $to])->get();
    }
    else{
         $issuances=Issuance::all();
     }

     if($request->print=='yes')
     {
        $name='Issuances.pdf';
        $pdf = PDF::loadView('reports.issuance_PDF', ['issuances'=>$issuances,'_to'=>$_to,'_from'=>$_from]);
        return $pdf->download($name);
     }
     return view('reports.issuancereport',compact('zones','_from','_to', 'users', 'items', 'issuances'));
    
 }



 public function issuanceereport(Request $request)
 {
    $zones=Zone::all();
    $users=User::all();
    $items=Item::all();
    $issuancees=Issuancee::all();


    $requests=null;
    $_from=$request->from;
    $_to=$request->to;

    if($request->from!=null && $request->from!=null)
       {
$from=Carbon::createFromFormat('Y-m-d',$request->from);
  $to=Carbon::createFromFormat('Y-m-d',$request->to);
$issuancees=Issuancee::whereBetween('created_at', [$from, $to])->get();
    }
    else{
         $issuancees=Issuancee::all();
     }
     if($request->print=='yes')
     {
        $name=' EngineerIssuances.pdf';
        $pdf = PDF::loadView('reports.issuancee_PDF', ['issuancees'=>$issuancees,'_to'=>$_to,'_from'=>$_from]);
        return $pdf->download($name);
     }
     return view('reports.issuanceereport',compact('zones','_from','_to', 'users', 'items', 'issuancees'));
    
 }
 
 public function returnreport(Request $request)

 {
    $zones=Zone::all();
    $users=User::all();
    $items=Item::all();
    $returnss=Returns::all();


    $requests=null;
    $_from=$request->from;
    $_to=$request->to;

    if($request->from!=null && $request->from!=null)
       {
$from=Carbon::createFromFormat('Y-m-d',$request->from);
  $to=Carbon::createFromFormat('Y-m-d',$request->to);
$returnss=Returns::whereBetween('created_at', [$from, $to])->get();
    }
    else{
         $returnss=Returns::all();
     }

     if($request->print=='yes')
     {
        $name='TeamLead Returns.pdf';
        $pdf = PDF::loadView('reports.returns_PDF', ['returnss'=>$returnss,'_to'=>$_to,'_from'=>$_from]);
        return $pdf->download($name);
     }
     return view('reports.returnreport',compact('zones','_from','_to', 'users', 'items', 'returnss'));
    
 }

 public function returnedreport(Request $request)

 {
    $zones=Zone::all();
    $users=User::all();
    $items=Item::all();
    $returneds=Returned::all();


    $requests=null;
    $_from=$request->from;
    $_to=$request->to;

    if($request->from!=null && $request->from!=null)
       {
$from=Carbon::createFromFormat('Y-m-d',$request->from);
  $to=Carbon::createFromFormat('Y-m-d',$request->to);
$returneds=Returned::whereBetween('created_at', [$from, $to])->get();
    }
    else{
         $returneds=Returned::all();
     }

     if($request->print=='yes')
     {
        $name='Engineer Returns.pdf';
        $pdf = PDF::loadView('reports.returned_PDF', ['returneds'=>$returneds,'_to'=>$_to,'_from'=>$_from]);
        return $pdf->download($name);
     }
     return view('reports.returnedreport',compact('zones','_from','_to', 'users', 'items', 'returneds'));
    
 }
// approval begins here
 public function approve( Request $request, $id)
 {
   $request->validate([
      #'quantity'=>'numeric|required',
      
  ]);
    $request=Requests::findOrFail($id);
   $items=$request->request_item;
 # $items=RequestItems::where('requests_id',$id)->get();
 #dd($items);
   foreach($items as $item)
   {
      $stock=Stock::where('item_id',$item->item_id)->first();
      if($stock==null)
  
      {
        return redirect()->back()->with('error','You have no '.$item->name.' stock to issue');
      }
      $available_stock=$stock->quantity;
   
  
      if($item->quantity>$available_stock)
      {
          return redirect()->back()->with('error','The available is too low for requested issuance');
      }
     

      $stock->quantity=$stock->quantity-$item->quantity;
      $stock->save();
      #dd($stock);
   }
   
    $request->status='approved';
    $request->save(); 
   
    foreach($items as  $item)
    {
     $team_lead=TeamLeadStock::where('user_id',$request->user_id)->where('item_id',$item->item_id)->first();
     if( $team_lead==null)  
     
     {
        $new_stock=new TeamLeadStock;
        $new_stock->user_id=$request->user_id;
        $new_stock->item_id=$item->item_id;
        $new_stock->quantity=$item->quantity;
        $new_stock->save();
  
     } 
     else
    {
     $team_lead->quantity=$team_lead->quantity+$item->quantity;
     
     $team_lead->save();
    }
  }
    


  
    

    return redirect()->back()->with('success','Request approved successfully');
 }
 public function reject( Request $request, $id)
 {
   $requests=Requests::findOrFail($id);
   $comment= new Comments;
   $comment->comments=$request->comments;
   $comment->requests_id=$requests->id;
   $comment->save();
   
    $request=Requests::findOrFail($id);
    $request->status='rejected';
    $request->save();

   
    

    return redirect()->back()->with('success','Request rejected successfully');
 }

 public function approval(Request $request, $id)
 {
   $request->validate([
      #'quantity'=>'numeric|required',
      
  ]);
    $request=RequestEngineer::findOrFail($id);
   $items=$request->erequests_item;

   foreach($items as $item)
   {
      $stock=TeamLeadStock::where('user_id',$request->user_id)->where('item_id',$item->item_id)->first();
      if( $stock==null)  
      
  
      {
        return redirect()->back()->with('error','You have no '.$item->name.' stock to issue');
      }
      $available_stock=$stock->quantity;
   
  
      if($item->quantity>$available_stock)
      {
          return redirect()->back()->with('error','The available is too low for requested issuance');
      }

      $stock->quantity=$stock->quantity-$item->quantity;
      $stock->save();

   }
   
    $request->rstatus='Received';
    $request->save();
        
 return redirect()->back()->with('success','Items Received successfully');
 }

 public function rejected(Request $request, $id)
 {
   $requestengineer=RequestEngineer::findOrFail($id);
   $comment= new EngineerComment;
   $comment->request_engineer_id=$requestengineer->id;
   $comment->comment=$request->comment;
   $comment->save();

    $requestengineer=RequestEngineer::findOrFail($id);
    $requestengineer->status='rejected';
    $requestengineer->save();

    return redirect()->back()->with('success','request rejected successfully');
 }
 public function purchase(Request $request)
 {
    $id=$request->item_id;
   $request->validate([
      'quantity'=>'numeric|required|min:0|not_in:0',
      'PO_number'=>'required|string|unique:purchases',
  ]);
  $items=Session::get('cart');
  $price= Price::where('item_id',$request->item_id)->first();
   if(!$items)
   {
      $items=[
            $id=[
               'item_id'=>$request->item_id,
               'vendor_id'=>$request->vendor_id,
               'PO_number'=>$request->PO_number,
               'quantity'=>$request->quantity,
               'price'=>$request->quantity*$price->price,
            ]
      ];
    Session::put('cart',$items);
   }
   else{
      if(isset($items[$id]))
      {
         return redirect()->back()->with('error','Item already added. Remove the item to add again.');
      }
      $items[$id]=[
         'item_id'=>$request->item_id,
         'vendor_id'=>$request->vendor_id,
         'PO_number'=>$request->PO_number,
         'quantity'=>$request->quantity,
         'price'=>$request->quantity*$price->price,
      ];
      Session::put('cart',$items);
   }
   
    return redirect()->back()->with('success','Item added successfully. ');
 }
 public function remove($id)
 {









   //
    $items=Session::get('cart');
    if(isset($items[$id]))
    {
       unset($items[$id]);
       Session::put('cart',$items);
    }
    if(count($items)<2)
    {
        Session::forget('cart');
    }
    return redirect()->back()->with('success','Item removed successfully. ');
 }
 public function complete()
 {
   $items=Session::get('cart');
   if(!$items)
   {
      return redirect()->back()->with('success','Please add items first. ');
   }
   $purchase= new Purchase();
   $purchase->vendor_id=$items[0]['vendor_id'];
   $purchase->PO_number=$items[0]['PO_number'];
   $price=0;
   foreach($items as $item)
   {
      $price=$price+$item['price'];
   }
   $purchase->price=$price;
   $purchase->save();

   foreach($items as $item)
   {
         $purchase_item=new PurchaseItem();
         $purchase_item->purchase_id=$purchase->id;
         $purchase_item->item_id=$item['item_id'];
         $purchase_item->quantity=$item['quantity'];
         $purchase_item->save();
            $stock= Stock::where('item_id',$purchase_item->item_id)->first();
            if($stock==null)
            {
               $new_stock=new Stock;
               $new_stock->item_id=$purchase_item->item_id;
               $new_stock->quantity= $purchase_item->quantity;
               $new_stock->save();
            }
            else
            {
               $stock->quantity=$stock->quantity+$purchase_item->quantity;
               $stock->save();
            }
      }
      Session::forget('cart');
      return redirect()->route('purchase.index')->with('success', 'Purchase added successfully');
   }



   #teamlead request
   public function Request(Request $request)
   {
   $id=$request->item_id;
     $request->validate([
        'user_id'=>'required',
        'zone_id'=>'required',
        'item_id'=>'required',
        'quantity'=>'numeric|required|min:0|not_in:0',
    ]);
    $items=Session::get('request');
     if(!$items)
     {
        $items=[
              $id=>[
                 'item_id'=>$request->item_id,
                 'user_id'=>$request->user_id,
                 'quantity'=>$request->quantity,
                 'zone_id'=>$request->zone_id,
              ]
        ];
      Session::put('request',$items);
     }
     else{
        if(isset($items[$id]))
        {
           return redirect()->back()->with('error','Item already added to the request. Remove the item to add again.');
        }
        $items[$id]=[
         'item_id'=>$request->item_id,
         'user_id'=>$request->user_id,
         'quantity'=>$request->quantity,
         'zone_id'=>$request->zone_id,
        ];
        Session::put('request',$items);
     }
      return redirect()->back()->with('success','Item added successfully. ');
   }
   public function removerequest($id)
   {
      $items=Session::get('request');
         if(count($items)<2)
         {
            Session::forget('request');
         }
         else
         {
            unset($items[$id]);
            Session::put('request',$items);
         }
      return redirect()->back()->with('success','Item removed successfully.');
   }



   public function completerequest()
 {
   $items=Session::get('request');
   #dd($items);
   if(!$items)
   {
      return redirect()->back()->with('success','Please add items first. ');
   }

   $requests =  new Requests;
   $first_item = reset($items);
   $requests->user_id=$first_item['user_id'];
   $requests->zone_id=$first_item['zone_id'];
   $requests->status ='pending';
   $requests->save();
   
   foreach($items as $req=>$item)
   {
      
         $request_item=new RequestItems();
         $request_item->requests_id=$requests->id;
         $request_item->item_id=$item['item_id'];
         $request_item->quantity=$item['quantity'];
         $request_item->save();
   }
   /*(Auth::user()->hasRole('Admin'))
      $admin=User::where('hasRole',Admin)->get();
      Notification::send($admin,new Approval());
*/
      /*$user=User::findOrFail($requests->user_id);
      $user = User::where('id',$requests->user_id)->first();
      $user->notify(new Approval());*/
      Session::forget('request');
      return redirect()->route('request.drafts')->with('success','Request sent successfully');
   }



#engineer request
   public function e_request(Request $request)
   {
   $id=$request->item_id;
     $request->validate([
        'user_id'=>'required',
        'zone_id'=>'required',
        'item_id'=>'required',
        'quantity'=>'numeric|required|min:0|not_in:0',
        'purpose'=>'required|string'
    ]);
    $items=Session::get('e_request');
     if(!$items)
     {
        $items=[
              $id=[
                 'item_id'=>$request->item_id,
                 'user_id'=>$request->user_id,
                 'quantity'=>$request->quantity,
                 'zone_id'=>$request->zone_id,
                 'purpose'=>$request->purpose
              ]
        ];
      Session::put('e_request',$items);
     }
     else{
        if(isset($items[$id]))
        {
           return redirect()->back()->with('error','Item already added to the request. Remove the item to add again.');
        }
        $items[$id]=[
         'item_id'=>$request->item_id,
         'user_id'=>$request->user_id,
         'quantity'=>$request->quantity,
         'zone_id'=>$request->zone_id,
         'purpose'=>$request->purpose
        ];
        Session::put('e_request',$items);
     }
      return redirect()->back()->with('success','Item added successfully. ');
   }
   public function removee_request($id)
   {
      $items=Session::get('e_request');
         if(count($items)<2)
         {
            Session::forget('e_request');
         }
         else
         {
            unset($items[$id]);
            Session::put('e_request',$items);
         }
      return redirect()->back()->with('success','Item removed successfully.');
   }




  
   public function completee_request()
 {
   $items=Session::get('e_request');
   if(!$items)
   {
      return redirect()->back()->with('success','Please add items first. ');
   }

   $requests =  new RequestEngineer();
   $requests->user_id=$items[0]['user_id'];
   $requests->zone_id=$items[0]['zone_id'];
   $requests->purpose=$items[0]['purpose'];
   $requests->engineer_id= Auth::user()->id;
   $requests->status ='pending';
   $requests->save();
   
   foreach($items as $item)
   {
         $request_item=new RequestEngineersItem;
         $request_item->request_engineer_id=$requests->id;
         $request_item->item_id=$item['item_id'];
         $request_item->quantity=$item['quantity'];
         $request_item->save();
   }
      
   $user=User::findOrFail($requests->user_id);

  #$user=User::where('role_id',2)->get();
  # Notification::send($user,new Approval());
  $user = User::where('id',$requests->user_id)->first();
  $user->notify(new Approval());
   Session::forget('e_request');
   return redirect()->route('requests.drafts')->with('success','Draft  Added Successfully');
   }
}



