

@extends('layouts.main')

@section('title')
<title>Engineer Request</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Engineer Request</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Engineer Request</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Engineer Request
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
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Purpose</th>
                                            <th>Status</th>
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
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($requestengineers as $requestengineer)
                                        <tr>
                                            <td>{{$requestengineer->id}}</td>
                                            <td>{{$requestengineer->user->name}}</td>
                                            <td>{{$requestengineer->zone->zone}}</td>
                                             <td>{{$requestengineer->item->name}}</td>
                                            <td>{{$requestengineer->quantity}}</td>
                                             <td>{{$requestengineer->purpose}}</td>
                                              <td>{{$requestengineer->status}}</td>
                                             <td>{{$requestengineer->created_at}}</td>
                                            <td><a href="{{route('requestengineer.edit', $requestengineer->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            <td>
                                            <form id= "delete" action="{{route('requestengineer.destroy', $requestengineer->id)}}" method="post">
                                                 @csrf
                                                @method('DELETE')    
                                                <button type="submit" form="delete" style="border: none;background:color:transparent;"> 
                                                    <i class="fa fa-trash text-danger"></i>
                                                </button> 
                                            </form>
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