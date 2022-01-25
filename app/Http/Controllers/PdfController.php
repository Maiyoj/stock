<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\Models\Purchase;
use App\Models\Item;
use App\Models\Vendor;
use App\Models\Price;
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

    public function purchase($id)
    {
        $purchase=Purchase::findOrFail($id);
        
        $items=Item::all();
          // share data to view
           view()->share('pdf/purchase',$purchase);
            $pdf = PDF::loadView('pdf/purchase', ['purchase' => $purchase]);
            return $pdf->download('pdf.purchase');
        
    }
    public function price()
    {
           $price=Price::all();
        
          // share data to view
           view()->share('pdf/price',$price);
            $pdf = PDF::loadView('pdf/price', ['price' => $price]);
            return $pdf->download('pdf.price');
        
    }


}