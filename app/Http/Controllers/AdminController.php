<?php

namespace App\Http\Controllers;

use App\Models\RequestEngineer;
use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\TeamLeadStock;

class AdminController extends Controller
{
    public function request(){

        $requests = Requests::all();

        return view ('adm.request', compact('requests'));
    }

    public function stock(){

        $stocks = TeamLeadStock::all();
        return view ('adm.stock', compact('stocks'));

    }
        public function re(){

            $requestengineers = RequestEngineer::all();

            return view ('adm.re', compact('requestengineers'));
        }

        public function pm(){

            $pm = Requests::all();
             return view('adm.pm', compact('pm'));
        }
    
}
