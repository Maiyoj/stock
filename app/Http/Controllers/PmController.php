<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\RequestEngineer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PmController extends Controller
{
public function index(){

$requests=Requests::all();
return view('pm.index', compact('requests'));


}

    public function approve($id)
    {
        
        $requests=Requests::findOrFail($id);
        $requests->pmstatus='approved';
        $requests->save();

        return redirect()->back()->with('success','Request approved successfully');
    }


    public function reject(){

        $requests=Requests::all();
        $requests->pmstatus='rejected';
        $requests->save();
        return redirect()->back()->with('success','Request Rejected successfully');
    }


    public function approvee($id)
    {
        
        $requestengineer=RequestEngineer::findOrFail($id);
        $requestengineer->status='approved';
        $requestengineer->save();

        return redirect()->back()->with('success','Request approved successfully');
    }



   public function draft($id){
    $requestengineers=RequestEngineer::findOrFail($id);
    
 
    $requestengineers->draft=1;
    $requestengineers->save();
    return redirect()->route('requestengineer.index')->with('success','Request Sent successfully');

   }

   public function drafts($id){
    $requests=Requests::findOrFail($id);
    

    $requests->draft=1;
    $requests->save();
    return redirect()->route('request.index')->with('success','Request Sent successfully');

   }
}