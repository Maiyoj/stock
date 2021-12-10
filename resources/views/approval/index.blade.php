

@extends('front.index')

@section('title')
<title>Request Approval</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4"> Request Approval</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Request Approval</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Request Approval
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
                                            <th>No. of Items</th>
                                            <th>Purpose</th>
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
                                                <th>No. of Items</th>
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($requestengineer as $requestengineer)
                                        <tr>
                                            <td>{{$requestengineer->id}}</td>
                                            <td>{{$requestengineer->user->name}}</td>
                                            <td>{{$requestengineer->zone->zone}}</td>
                                            <td>{{$requestengineer->erequests_item->count()}}</td>
                                            <td>{{$requestengineer->purpose}}</td>
                                            <td class="{{$requestengineer->status=='pending' ? 'text-danger' :'text-success'}}">{{$requestengineer->status}}</td>
                                            <td>{{$requestengineer->created_at}}</td>
                                            <td><a href="{{route('requestengineer.show', $requestengineer->id)}}"><i class="fa fa-eye text-primary"> </i></td>
                                              
                                                @if ($requestengineer->status=='pending')
                                                <td><a href="{{route('requestengineer.approvee', $requestengineer->id)}}"><i class="fa fa-check text-primary"> </i></td>
                                                <td><a href="{{route('requestengineer.rejected', $requestengineer->id)}}"><i class="fa fa-times text-danger"> </i></td>
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