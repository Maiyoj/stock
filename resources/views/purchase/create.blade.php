@extends('layouts.main')

@section('title')
<title>Add Purchase</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Purchase</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Purchases</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Purchase
                            </div>
                            <div class="card-body">
                                        <form action="{{route('purchase.store')}}" method="post">  
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
                                            
                                               <!-- <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Name</label>
                                                    </div> -->

                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="item_id" id="" class="form-control"> 
                                                            @foreach ($items as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                        <label for="inputFirstName">Item</label>
                                                    </div>
                                                </div>

                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <select name="vendor_id" id="" class="form-control"> 
                                                                @foreach ($vendors as $vendor)
                                                                    <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="inputFirstName">Vendor</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" value="" id="inputFirstName" type="text" name="PO_number" placeholder="Enter your first name" />
                                                            <label for="inputFirstName">PO Number</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" value="" id="inputFirstName" type="text" name="quantity" placeholder="Enter your first name" />
                                                            <label for="inputFirstName">Quantity</label>
                                                        </div>
                                                    </div>


                                          
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Add Purchase</a></div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  