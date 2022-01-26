

@extends('front.index')

@section('title')
<title>Engineer Reports</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Engineer Reports
                            </div>
                            <div class="card-body">

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            
                            </div>
                            @endif
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Site Name</th>
                                            <th>Client Name</th>
                                            <th>Allocated Quantity</th>
                                            <th>Used Quantity</th>
                                            <th>Remaining Quantity</th>
                                            <th>Document</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Site Name</th>
                                            <th>Client Name</th>
                                            <th>Allocated Quantity</th>
                                            <th>Used Quantity</th>
                                            <th>Remaining Quantity</th>
                                            <th>Document</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($reports as $report)
                                            <tr>
                                                <td>{{$report->id}}</td>
                                                <td>{{$report->site_name}}</td>
                                                <td>{{$report->client_name}}</td>
                                                <td>{{$report->allocated_quantity}}</td>
                                                <td>{{$report->used_quantity}}</td>
                                                <td>{{$report->remaining_quantity}}</td>
                                                <td><a href="" target="_blank"><i class="fa fa-download"></i>Download</a></td>
                                            </tr>                                                           
                                        @empty
                                        

                                        @endforelse
                                  
                                    
                                    </tbody>
                                </table>
                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <div class="p-2 bd-highlight"> <a class="btn btn-primary" href="/admin">Go Back</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection  