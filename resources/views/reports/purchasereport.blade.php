
@extends('layouts.main')

@section('title')
<title>Purchase</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Purchase Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Purchase Report</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Purchase Report
                            </div>
                            <div class="card-body">
                                <form action="" method="get" class="mb-5">
                            
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
                                                    <a href="/purchases-reports?print=yes" class="btn btn-red"><i class="fa fa-print fa-lg text-success fa-2x"></i> Print</a>
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
                                            <th>Item</th>
                                            <th>Vendor</th>
                                            <th>PO Number</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Date Added</th>

                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Item</th>
                                            <th>Vendor</th>
                                            <th>PO Number</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($purchases as $purchase)
                                        <tr>
                                            <td>{{$purchase->id}}</td>
                                            <td>{{$purchase->item->name}}</td>
                                            <td>{{$purchase->vendor->name}}</td>
                                            <td>{{$purchase->PO_number}}</td>
                                            <td>{{$purchase->quantity}}</td>
                                            <td>{{$purchase->price}}</td>
                                             <td>{{$purchase->created_at}}</td>
                                           
                                     </td>
                                     <td>
                                        <a href="{{route('reports.purchasereport',$purchase->id)}}" class="text-primary"><i class="fa fa-eye fa-2x"></i> </a>
                                     </td>
                                            </tr>                                                           
                                        @empty
                                        

                                        @endforelse
                                  
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection  