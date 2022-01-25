<?php

namespace App\Http\Controllers;

use App\Models\Item;

use App\Models\Price;
use App\Models\Vendor;
use App\Models\Purchase;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

use App\Models\Zone;

class PdfController extends Controller
{
    


    public function index()
    {
           $item = Item::all();
    
          // share data to view
           view()->share('pdf/item',$item);
            $pdf = PDF::loadView('pdf/item', ['item' => $item]);
            return $pdf->download('pdf.item');
        
    }


    public function vendor()
    {
           $vendor =Vendor::all();
    
          // share data to view
           view()->share('pdf/vendors',$vendor);
            $pdf = PDF::loadView('pdf/vendors', ['vendor' => $vendor]);
            return $pdf->download('pdf.vendors');
        
    }

    public function purchases()
    {
        $purchases=Purchase::all();
        
        $items=Item::all();
          // share data to view
           view()->share('pdf/purchases',$purchases);
            $pdf = PDF::loadView('pdf/purchases',['purchases'=>$purchases]);
            return $pdf->download('purchases.pdf');
    }
    public function purchase($id)
    public function purchase()
    {
        $purchase=Purchase::all();
        
          // share data to view
           view()->share('pdf/purchase',$purchase);
            $pdf = PDF::loadView('pdf/purchase',['purchase'=>$purchase,'items'=>$items]);
            return $pdf->download('purchase.pdf');
    }
    public function price()
    {
           $price=Price::all();
        
          // share data to view
           view()->share('pdf/price',$price);
            $pdf = PDF::loadView('pdf/price', ['price' => $price]);
            return $pdf->download('pdf.price');
        
    }

    public function zone(){
            $zones = Zone::all();

             
          // share data to view
           view()->share('pdf/zone',$zones);
           $pdf = PDF::loadView('pdf/zone', ['zones' => $zones]);
           return $pdf->download('pdf.zone');
    }
   
    public function request(){
          
        $requests = Requests::all();
   // share data to view
   view()->share('pdf/request',$requests);
   $pdf = PDF::loadView('pdf/request', ['requests' => $requests]);
   return $pdf->download('pdf.request');

    }


}
