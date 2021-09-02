

@extends('layouts.main')

@section('title')
<title> Engineer Returns Reports </title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4"> Engineer Returns Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Returns Report</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Returns Report
                            </div>
                            <form action="" method="get" class="mb-3">
                            
                                <div class="row filter-row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group form-focus">
                                            <label class="focus-label mb-3">From</label>
                                            <div class="">
                                                <input class="form-control floating datetimepicker" value="{{$_from}}" name="from" type="date">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group form-focus">
                                            <label class="focus-label mb-3">To</label>
                                            <div class="">
                                                <input class="form-control floating datetimepicker" value="{{$_to}}" name="to" type="date">
                                            </div>
                                        </div>
                
                                    </div>
                                   <div class="col-sm-2 col-md-1 ">
                                        <div class="form-group form-focus">
                                            <label class="focus-label mb-3">Filter Records</label>
                                            <div class="">
                                                <button href="#" class="btn btn-primary btn-block" type="submit"> Search </button>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-sm-4 col-md-2 ">
                                        <div class="form-group form-focus">
                                            <label class="focus-label mb-3">Print PDF </label>
                                            <div class="">
                                                <a href="/returneds-reports?print=yes" class="btn btn-red"><i class="fa fa-print fa-lg text-success fa-2x"></i> Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-border table-striped custom-table mb-0">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item</th>
                                                <th>User</th>
                                                <th>Zone</th>
                                                <th>Quantity</th>

                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($returneds as $returned)
                                        <tr>
                                            <td>{{$returns->id}}</td>
                                            <td>{{$returns->user->name}}</td>
                                            <td>{{$returns->zone->zone}}</td>
                                            <td>{{$returns->item->name}}</td>
                                            <td>{{$returns->quantity}}</td>
                                             <td>{{$returns->created_at}}</td>
                                             <td>
                                                <a href="{{route('reports.returnedreport',$returned->id)}}" class="text-primary"><i class="fa fa-eye fa-2x"></i> </a>
                                             </td>
                                             </td>
                                            </tr>                                                           
                                        @empty
                                    @endforelse
    
                                    </tbody>
                                </table>
                                <div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection  