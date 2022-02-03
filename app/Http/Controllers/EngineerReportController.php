<?php

namespace App\Http\Controllers;

use App\Models\EngineerReport;
use App\Models\RequestEngineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('engineer_reports.create',compact('requestengineer'));
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
            'quantity'=> 'required|integer',
            'document'=> 'nullable|mimes:pdf',
        ]);
        $engineerReport = new EngineerReport();
        $engineerReport->user_id = Auth::user()->id;
        $engineerReport->request_engineer_id = $request->request_id;
        $engineerReport->item_id = $request->item_id;
        $engineerReport->site_name = $request->site_name;
        $engineerReport->client_name = $request->client_name;
        $engineerReport->allocated_quantity = $request->quantity;

        $file = $request->document;
        if ($file !== null){
        $file_name = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path().'/engineer_reports_files/',$file_name);
        }
        $engineerReport->document = $file_name;
        $engineerReport->save();


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
}
