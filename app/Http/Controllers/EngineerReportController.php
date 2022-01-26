<?php

namespace App\Http\Controllers;

use App\Models\EngineerReport;
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
    public function create()
    {
        return view('engineer_reports.create');
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
            'allocated_quantity'=> 'required|integer',
            'used_quantity'=> 'required|integer',
            'remaining_quantity'=> 'required|integer',
            'document'=> 'required|mimes:pdf',
        ]);
        $engineerReport = new EngineerReport();
        $engineerReport->user_id = Auth::user()->id;
        $engineerReport->site_name = $request->site_name;
        $engineerReport->client_name = $request->client_name;
        $engineerReport->allocated_quantity = $request->allocated_quantity;
        $engineerReport->used_quantity = $request->used_quantity;
        $engineerReport->remaining_quantity = $request->remaining_quantity;

        $file = $request->document;
        $file_name = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path().'/engineer_reports_files/',$file_name);

        $engineerReport->document = $file_name;
        $engineerReport->save();

        return redirect()->route('engineer_reports.index')->with('success','Report added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EngineerReport  $engineerReport
     * @return \Illuminate\Http\Response
     */
    public function show(EngineerReport $engineerReport)
    {
        //
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
