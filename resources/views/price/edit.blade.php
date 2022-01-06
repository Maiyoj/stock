

@extends('layouts.main')

@section('title')
<title>Add Price</title>
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
                                Price
                            </div>
                            <div class="card-body">
                                        <form action="{{route('price.update', $price->id)}}" method="post">  
                                            @csrf
                                            @method('PATCH')
                                            <div class="row mb-3">
                                            <div class="col-md-8">
                                                @if ($errors->any())
                                            @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                {{$error}}
                                        </div>

                                            @endforeach

                                            @endif
                                      
                                            <div class="col-md-8 mt-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select name="vendor_id" id="" class="form-control"> 
                                                        @foreach ($vendors as $vendor)
                                                            <option value="{{$vendor->id}}" {{$vendor->id==$price->vendor_id ?  'selected' : ''}}>{{$vendor->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="inputFirstName">Vendor</label>
                                                </div>

                                                </div>





                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="item_id" id="" class="form-control"> 
                                                            @foreach ($items as $item)
                                                                <option value="{{$item->id}}" {{$item->id==$price->item_id ?  'selected' : ''}}>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="inputFirstName">Item</label>
                                                    </div>

                                                    </div>



                                                    

                                                        <div class="col-md-8 mt-4">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" value="{{$price->price}}" id="inputFirstName" type="text" name="price" placeholder="Enter your first name" />
                                                                <label for="inputFirstName">Price</label>
                                                            </div>
                                                            </div>


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