

@extends('layouts.main')

@section('title')
<title>Request</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>


                        {{-- <div class="card mb-4">
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

                    @can('requestengineer-create')
                    <div class="d-flex flex-row-reverse bd-highlight">
                    <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('requestengineer.create') }}">Add Request</a></div>
                    </div>
                    @endcan
                     </div>
                      </div>
                    --}}


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fab fa-product-hunt"></i>
                            Actions
                           
                                <div class="d-flex flex-row bd-highlight mb-3">
                                {{--<div class="p-2 bd-highlight"><a href="" class="btn btn-danger"  id="deleteAllSelectedRecord" >Delete Selected</a></div> --}}
                                <div class="p-2 bd-highlight"><a class="btn btn-success" href="{{ route('csv.requestengineer-export') }}">Export data</a></div>
                                @can('requestengineer-create')
                            <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('requestengineer.create') }}">Add Request</a></div>
                            @endcan
                            </div>
                        </div>
                    </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="btn-group dropend">
                                    <button type="button" class=" dropdown-toggle btn-sm position:right"  style=""data-bs-toggle="dropdown" aria-expanded="false">
                                      
                                      <i class="fas fa-bars"></i> </button>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Export to PDF</a></li>
                                      <li><a class="dropdown-item" href="#">Import Excel</a></li>
                                    </ul>
                                  </div> 
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
                                            <th>Received Status</th>
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
                                                <th>Received Status</th>
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
                                            <td>{{$requestengineer->erequests_item->count()}}</td>
                                            <td>{{$requestengineer->purpose}}</td>
                                            <td class="{{$requestengineer->status=='pending' ? 'text-danger' :'text-success'}}">{{$requestengineer->status}}</td>
                                            <td class="{{$requestengineer->rstatus=='Not received' ? 'text-danger' :'text-success'}}">{{$requestengineer->rstatus}}</td>
                                             <td>{{$requestengineer->created_at}}</td>
                                             @can('requestengineer-show')
                                            <td><a href="{{route('requestengineer.show', $requestengineer->id)}}"><i class="fa fa-eye text-primary"> </i></td>
                                            @endcan
                                            @can('requestengineer-delete')
                                            <td>
                                                <form action="{{url('requestengineer/'.$requestengineer->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
                                                </form>
                                              </td>
                                              @endcan
                                          @if ($requestengineer->rstatus=='Not received')
                                          {{-- <td><a href="{{route('requestengineer.approval', $requestengineer->id)}}"><i class="fa fa-check text-danger"></i></td> --}}
                                          <td><a href="{{route('requestengineer.approval', $requestengineer->id)}}"><i class="btn-btn-primary text-danger">Receive</i></td> 
                                         @endif
                                         
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