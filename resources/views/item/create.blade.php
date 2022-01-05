@extends('layouts.main')

@section('title')
<title>Add Item</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Items</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Items</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Items
                            </div>
                            <div class="card-body">
                                        <form action="{{route('item.store')}}" method="post">  
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
                                            
                                           <div class="col-md-8 mt-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select name="type" id="" class="form-control"> 
                                            
                                              <option value="Goods">Goods</option>
                                              <option value="Support">Services</option>
                                                </select>

                                               <label for="inputFirstName">Type</label>
                                            </div>
                                        </div>


                                
                                    <div class="col-md-8  mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter your first name" />
                                            <label for="inputFirstName">Name</label>
                                        </div>
                                    </div>
                              
                              
                                    <div class="col-md-8  mt-4">
                                        <label for="">Description</label>
                                        <div class="form-floating mb-3 mb-md-0">
                                            <textarea rows = "5" cols = "50" name = "description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4" >
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="units" placeholder="Enter your first name" />
                                            <label for="inputFirstName">Units</label>
                                        </div>
                                    </div>


                                    <div class="col-md-8 mt-4" >
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="threshold" type="number" name="threshold" placeholder="Enter product threshold" />
                                            <label for="threshold">Threshold</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="sku" placeholder="Enter your first name" />
                                            <label for="inputFirstName">SKU</label>
                                        </div>
                                    </div>
                                            {{-- <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Add Item</a></div>
                                            </div> --}}
                                            <div class="col-md-8 mt-4">
                                             <div class="d-grid gap-2 col-4 mx-auto">
                                            <div class="col">
                                            <button type="submit" class="btn btn-success">Save</button>
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