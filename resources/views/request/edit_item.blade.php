@extends('front.index')

@section('title')
<title>Edit Item</title>
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
                        Edit Item
                            </div>
                            <div class="card-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-8">
                                        <form id="add-item" action="{{route('request_edit.update',$requestitem->id)}}" method="post">  
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
                                                </div>
                                                <div class="col-md-12 mt-4">
                                        
                                             
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="item_id" id="" class="form-control"> 
                                                            @foreach ($items as $item)
                                                                <option value="{{$item->id}}" {{$requestitem->item_id==$item->id ? 'selected' : ''}} >{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                    
                                                        <label for="inputFirstName">Item</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="quantity" value="{{$requestitem->quantity}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Quantity</label>
                                                    </div>
                                                </div>      
                                                <div class=" col-md-6 mt-4 mb-0">
                                                <div class="d-grid"><button form="add-item" class="btn btn-info text-white" type="submit">Update Item</button></div>
                                                </div>
                                                <div class=" col-md-6 mt-4 mb-0">
                                                    <div class="d-grid"><a href="" class="btn btn-primary">Go To Request</a></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection  