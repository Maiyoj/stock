





@extends('layouts.main')

@section('title')
<title>Add Item</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit item</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit item</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Items
                            </div>
                            <div class="card-body">
                                        <form action="{{route('item.update', $item->id)}}" method="post">  
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
                                            </div> 
                                           <div class="col-md-8 mt-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select name="type" id="" class="form-control"> 
                                                    <option value="Goods">Goods</option>
                                                    <option value="Service">Services</option>
                                                </select>
                                                <label for="inputFirstName">Type</label>
                                            </div>
                                        </div>


                                
                                    <div class="col-md-8 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter your first name" value="{{$item->name}}" />
                                            <label for="inputFirstName">Name</label>
                                        </div>
                                    </div>
                              
                              
                                    <div class="col-md-8  mt-4">
                                        <label for="">Description</label>
                                        <div class="form-floating mb-3 mb-md-0">
                                            <textarea rows = "5" cols = "50" name = "description">{{$item->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="units" value="{{$item->units}}" placeholder="Enter your first name" />
                                            <label for="inputFirstName">Units</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4" >
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="threshold" type="number" name="threshold" value="{{$item->threshold}}" placeholder="Enter product threshold" />
                                            <label for="threshold">Threshold</label>
                                        </div>
                                    </div>



                                    <div class="col-md-8 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" value="{{$item->sku}}" name="sku" placeholder="Enter your first name" />
                                            <label for="inputFirstName">SKU</label>
                                        </div>
                                    </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Update Item</a></div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  