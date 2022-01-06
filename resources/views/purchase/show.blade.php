@extends('layouts.main')

@section('title')
<title>Show Purchase Details </title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Show Purchase Details </li>
                        </ol>
                        <div class="card mb-12">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Purchase Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="" method="post">  
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
                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{session('success')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="text" name="name" value="{{$purchase->id}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Purchase ID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="email" name="email" value="{{$purchase->purchase_items->count()}}"  placeholder="name@example.com"  />
                                                        <label for="inputFirstName">No of Items</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="address" value="{{$purchase->PO_number}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">PO Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="address" value="{{$purchase->vendor->name}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Vendor</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mt-4">
                                                <div class="d-grid gap-2 col-4 mx-auto">
                                               <div class="col">
                                             
                                               </div>
                                               </div>
                                               </div>
                                        </form>
                                    </div> 
                                    <div class="col-md-4">
                                        <h4>Purchase Items</h4>
                                        <table class="table table-striped">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th>Item </th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                
                                                @foreach ($purchase->purchase_items as $item)
                                                    @foreach ($items as $itm)
                                                        @if ($item->item_id ==$itm->id)
                                                        <tr>
                                                            <th scope="row">{{$itm->id}}</th>
                                                            <td>{{$itm->name}}</td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td>{{$itm->itemprice[0]->price}}</td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                                    <tr>
                                                        <th></th>
                                                        <th>Total Price: </th>
                                                        <th></th>
                                                        <th>{{$purchase->price}}</th>
                                                        
                                                    </tr>
                                            </tbody>
                                           
                                        </table>
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            <div class="p-2 bd-highlight"> <a class="btn btn-primary" href="/admin">Go Back</a></div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
@endsection  