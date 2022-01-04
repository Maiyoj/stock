

@extends('layouts.main')

@section('title')
<title>Issuances Approval</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
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
                                {{-- <table id="datatablesSimple">
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
                                            <td class="{{$request->status=='pending' ? 'text-danger' :'text-success'}}">{{$request->status}}</td>
                                             <td>{{$request->created_at}}</td>
                                             @if ($request->status=='pending')
                                            
                                                <td><a href="{{route('request.approve', $request->id)}}"><i class="fa fa-check text-primary"> </i></td>
                                                <td><a href="{{route('request.reject', $request->id)}}"><i class="fa fa-times text-danger"> </i></td>
                                             @endif
                                        
                                            
                        
                                            
                                            </tr>                                                           
                                        @empty
                                        

                                        @endforelse
                                  
                                        
                                       
                                    </tbody>
                                </table> --}}
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>No. of Items</th>
                                            <th>PM Approval</th>
                                            <th>Status</th>
                                            <th>Date Added</th>
                                            <th colspan="3">Action</th>
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
                                                <th>PM Approval</th>
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
                                            <td>{{$request->request_item->count()}}</td>
                                            <td class="{{$request->pmstatus=='waiting' ? 'text-danger' :'text-success'}}">{{$request->pmstatus}}</td>
                                           <td class="{{$request->status=='pending' ? 'text-danger' :'text-success'}}">{{$request->status}}</td>
                                             <td>{{$request->created_at}}</td>

                                            <td><a href="{{route('request.show', $request->id)}}"><i class="fa fa-eye text-primary"></i></td>
                                    
                                            @if ($request->status=='pending')
                                                <td><a href="{{route('request.approve', $request->id)}}"><i class="fa fa-check text-primary" class="btn btn-primary"> </i></td>
                                                {{-- <td><a href="#"><i class="fa fa-times text-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal"> </i></td>   --}}
                                                      <td><a href="#"><i class="btn-btn-primary text-danger"  type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal">Reject</i></td>  
                                            @endif
                                            </tr>                                                           
                                        @empty
                                       
                                        @endforelse
                                  
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                     {{-- Comments form --}}
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> Enter Comments</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{route('request.reject',  $request->id)}}" method="HEAD">  
                                    @csrf
                                 
                                    <div class="row mb-3">
                                    <div class="col-md-8">

                                    @if ($errors->any())
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                </div>

                                    @endforeach

                                    @endif
                                    <div class="form-floating mb-3 mb-md-0">
                                <textarea rows = "5" cols = "50" name = "comments"></textarea>
                                    </div>
                                    </div>
                               <div class="modal-footer">
                                {{-- <td><a href="{{route('comments.store', $request->id)}}"><i class="btn-btn-primary text-danger"  type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal">Submit Comment</i></td>   --}}

                              <button type="submit" class="btn btn-primary">Save changes</button> 
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                </main>
@endsection  