@extends('front.index')

@section('title')
<title>Add Report</title>
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
                                Add Report
                            </div>
                            <div class="card-body">
                                        <form action="{{route('report.store',$requestengineer->id)}}" method="post" enctype="multipart/form-data">  
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
                                            
            
                                
                                    <div class="col-md-8  mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="site_name" placeholder="Enter site name" />
                                            <label for="inputFirstName">Site Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8  mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputName" type="text" name="client_name" placeholder="Enter client name" />
                                            <label for="inputFirstName">Client Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select id="" name="item_id" class="form-control"> 
                                                @foreach ($requestengineer->erequests_item  as $item)
                                                    <option value="{{$item->items->id}}">{{$item->items->name}}</option>
                                                @endforeach
                                            </select>

                                           <label for="inputFirstName">Item</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="request_id" value="{{$requestengineer->id}}">
                                    <div class="col-md-8 mt-4" >
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="number" name="quantity" placeholder="Enter allocated quantity" />
                                            <label for="inputFirstName">Used Quantity</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="file" name="document" placeholder="Attach document" />
                                            <label for="inputFirstName">Document</label>
                                        </div>
                                    </div>
                                            {{-- <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Add Item</a></div>
                                            </div> --}}
                                            <div class="col-md-8 mt-4">
                                             <div class="d-grid gap-2 col-4 mx-auto">
                                            <div class="col">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <a class="btn btn-danger" href="/admin">Cancel</a>
                                            </div>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  