<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EngineerReport;
use App\Models\Item;
use App\Models\RequestEngineer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EngineerReportController extends Controller
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
        $reports = EngineerReport::where('user_id',Auth::user()->id)->get();
        Session::forget('report_items');
        return view('engineer_reports.index',compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $requestengineer = RequestEngineer::findOrFail($id);
        //dd(Session::get('report_items'));
        $items = Item::all();
        return view('engineer_reports.create',compact('requestengineer','items'));
    }
    public function session(Request $request,$id)
    {
        $request->validate([
            'site_name'=> 'required|string',
            'client_name'=> 'required|string',
            'quantity'=> 'required|integer',
            'document'=> 'required|mimes:pdf',
        ]);
        if($request->has('document'))
        {
            $request->validate([
                'document'=>'mimes:pdf'
            ]);
            $file = $request->document;
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('documents'),$file_name);
            Session::put('document',$file_name);
        }
      

        $items = Session::get('report_items');
        if (!$items) {
            $items=[
                $id=[
                    'site_name'=> $request->site_name,
                    'client_name'=> $request->client_name,
                    'item_id' => $request->item_id,
                    'allocated_quantity' => $request->quantity,
                    'request_engineer_id'=> $request->request_id
                ]
          ];
          Session::put('report_items',$items);
        } else {
            $items=[
                'site_name'=> $request->site_name,
                'client_name'=> $request->client_name,
                'item_id' => $request->item_id,
                'allocated_quantity' => $request->quantity,
                'request_engineer_id'=> $request->request_id
             ];
             Session::push('report_items',$items);
             //Session::forget('report_items');
        }
        
        return redirect()->back()->with('success','Item added successfully.');
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
            'site_name'=> 'required|string',
            'client_name'=> 'required|string',
        ]);
        $items = Session::get('report_items');
        if($items==null)
        {
            return redirect()->back()->withErrors('Please add items to the report');
        }
        foreach($items as $item)
        {
            $engineerReport = new EngineerReport();
            $engineerReport->user_id = Auth::user()->id;
            $engineerReport->request_engineer_id = $item['request_engineer_id'];
            $engineerReport->item_id = $item['item_id'];
            $engineerReport->site_name = $item['site_name'];
            $engineerReport->client_name = $item['client_name'];
            $engineerReport->allocated_quantity = $item['allocated_quantity'];
           
            $file = Session::get('document');
            if ($file !== null){
                $engineerReport->document = $file;
            }
           
            $engineerReport->save();
        }
        

        Session::forget('report_items');
        return redirect()->route('report.index')->with('success','Report added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EngineerReport  $engineerReport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request=RequestEngineer::findOrFail($id);
        return view('engineer_reports.show',compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EngineerReport  $engineerReport
     * @return \Illuminate\Http\Response
     */
    public function edit(EngineerReport $engineerReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EngineerReport  $engineerReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EngineerReport $engineerReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EngineerReport  $engineerReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(EngineerReport $engineerReport)
    {
        //
    }
    public function download($id)
    {
        $report = EngineerReport::findOrFail($id);
        $file= public_path().'/documents/'.$report->document;
        $headers = [
            'Content-Type' => 'application/pdf',
         ];

    return response()->download($file, 'report.pdf', $headers);
    }
}
