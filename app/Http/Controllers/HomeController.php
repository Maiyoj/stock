<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Issuancee;
use App\Models\ItemReports;
use App\Models\Item;
use App\Models\Vendor;
use Carbon\Carbon;
use App\Models\Price;
use App\Models\Purchase;
use App\Models\Zone;
use App\Models\User;
use App\Models\Issuance;
use App\Models\Returns;
use App\Models\Returned;
use PDF;
use App\Models\Requests;
use App\Models\Stock;
use App\Models\TeamLeadStock;
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
        if(Auth::user()->role_id==2)
        {
            $stocks=Issuancee::where('user_id',Auth::user()->id)->get();
            return view('stocks.engineer',compact('stocks'));
        }
        $stocks=Issuancee::all();
        return view('admin.index',compact('stocks'));
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

 public function approve($id)
 {
    
    $request=Requests::findOrFail($id);
    
    $stock=Stock::where('item_id',$request->item_id)->first();
    $available_stock=$stock->quantity;
    if($request->quantity>$available_stock)
    {
        return redirect()->back()->with('error','The available is too low for requested issuance');
    }

    $request->status='approved';
    $request->save(); 
   
    $stock->quantity=($stock->quantity)-$request->quantity;
    $stock->save();
    
    $team_lead=TeamLeadStock::where('user_id',$request->user_id)->where('item_id',$request->item_id)->first();
        $team_lead->quantity=($team_lead->quantity)+$request->quantity;
        $team_lead->save();

    return redirect()->back()->with('success','Request approved successfully');
 }
 public function reject($id)
 {
    $request=Requests::findOrFail($id);
    $request->status='rejected';
    $request->save();

    return redirect()->back()->with('success','Request rejected successfully');
 }

}



