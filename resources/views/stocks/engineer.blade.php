

@extends('layouts.main')

@section('title')
<title>Request</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4">Request</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Request</li>
                        </ol>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Files
                            <form action="{{ route('csv.returned-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                    
                                    <div class="custom-file text-right"   class="card mb-6">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" >
                                    <button class="btn btn-primary">Import data</button>
                                    <a class="btn btn-success" href="{{ route('csv.returned-export') }}">Export data</a>
                            </div>
                        </div>
                                
                            </form>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Request
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
                                            <th>No. of Items</th>
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
                                                <th>No. of Items</th>
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($stocks as $requestengineer)
                                        <tr>
                                            <td>{{$requestengineer->id}}</td>
                                            <td>{{$requestengineer->user->name}}</td>
                                            <td>{{$requestengineer->zone->zone}}</td>
                                            <td>{{$requestengineer->erequests_item->count()}}</td>
                                            <td>{{$requestengineer->purpose}}</td>
                                            <td>{{$requestengineer->status}}</td>
                                             <td>{{$requestengineer->created_at}}</td>
                                            <td><a href="{{route('requestengineer.show', $requestengineer->id)}}"><i class="fa fa-eye text-primary"> </i></td>
                                            <td>
                                                <form action="{{url('requestengineer/'.$requestengineer->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
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