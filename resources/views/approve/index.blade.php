

@extends('layouts.main')

@section('title')
<title>Issuances Approval</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4"> Issuances Approval</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Issuances Approval</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Issuances Approval
                            </div>
                            <div class="card-body">

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            
                            </div>
                            @endif
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Date Added</th>
                                            <th>Status</th>
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
                                                <th>Status</th>
                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($requests as $request)
                                        <tr>
                                            <td>{{$request->id}}</td>
                                            <td>{{$request->user->name}}</td>
                                            <td>{{$request->zone->zone}}</td>
                                            <td>{{$request->item->name}}</td>
                                            <td>{{$request->quantity}}</td>
                                            <td>{{$request->status}}</td>
                                             <td>{{$request->created_at}}</td>
                                             @if ($request->status=='pending')
                                                <td><a href="{{route('request.approve', $request->id)}}"><i class="fa fa-check text-primary"> </i></td>
                                                <td><a href="{{route('request.reject', $request->id)}}"><i class="fa fa-times text-danger"> </i></td>
                                             @endif
                                            
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