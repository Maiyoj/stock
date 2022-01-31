@extends('layouts.main')

@section('title')
<title>Show Request Details </title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Show Request Details </li>
                        </ol>
                        <div class="p-2 bd-highlight"><a class="btn btn-success text-white" href="{{ route('pdf.team',$request->id) }}">Export PDF</a></div>
                        <div class="card mb-12">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Request Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="" method="post">  
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    @if ($errors->any())
                                                        @foreach($errors->all() as $error)
                                                            <div class="alert alert-danger">
                                                                {{$error}}
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{session('success')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="text" name="name" value="{{$request->id}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Request ID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="email" name="email" value="{{$request->request_item->count()}}"  placeholder="name@example.com"  />
                                                        <label for="inputFirstName">No of Items</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="address" value="{{$request->zone->zone}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Zone</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="address" value="{{$request->user->name}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Engineer Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </form>
                                    </div> 






                                    
                                    <div class="col-md-4">
                                        <h4>Request Items</h4>
                                        <table id="datatablesSimple">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th>Item </th>
                                                <th>Quantity</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                
                                                @foreach ($request->request_item as $item)
                                                    @foreach ($items as $itm)
                                                        @if ($item->item_id ==$itm->id)
                                                        <tr>
                                                            <th scope="row">{{$itm->id}}</th>
                                                            <td>{{$itm->name}}</td>
                                                            <td>{{$item->quantity}}</td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>












                                    <div class="col-md-4">
                                        <h4>Comment</h4>
                                        <table class="table table-striped">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th>Comment</th>
                                               
                                              </tr>
                                            </thead>
                                            <tbody>
                
                                                
                                              
                                              
                                                @foreach($comment as  $cmt)
                                               
                                                        <tr>
                                                            <th scope="row">{{$cmt->id}}</th>
                                                            <td>{{$cmt->comments}}</td>
                                                            
                                                        </tr>
                                  
                                              @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
@endsection  