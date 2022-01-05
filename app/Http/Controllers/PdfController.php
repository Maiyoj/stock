<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\Models\Purchase;
use App\Models\Item;
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

    public function purchase()
    {
           $purchase=Purchase::all();
           $items=Item::all();
          // share data to view
           view()->share('pdf/purchase',$purchase);
            $pdf = PDF::loadView('pdf/purchase', ['purchase' => $purchase]);
            return $pdf->download('pdf.purchase');
        
    }



}
