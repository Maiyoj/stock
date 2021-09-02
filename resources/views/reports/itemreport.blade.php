@extends('layouts.main')

@section('title')
<title>Item Report</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Items</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Items Report </li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Items Reports
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
                                                <a href="/items-reports?print=yes" class="btn btn-red"><i class="fa fa-print fa-lg text-success fa-2x"></i> Print</a>
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
                                            <!-- <th>ID</th>-->
                                            <th>name</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!--<th>ID</th>-->
                                            <th>name</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($items as $item)
                                        <tr>
                                           <!-- {{$item->id}}</td>-->
                                            <td>{{$item->name}}</td>
                                             <td>{{$item->created_at}}</td>
                                             <td>
                                                <a href="{{route('reports.itemreport',$item->id)}}" class="text-primary"><i class="fa fa-eye fa-2x"></i> </a>
                                            </td>
                                        
                                            </tr>                                                           
                                        @empty
                                    @endforelse   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection  