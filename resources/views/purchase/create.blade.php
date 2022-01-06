@extends('layouts.main')

@section('title')
<title>Add Purchase</title>
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
                                Purchase
                            </div>
                            <div class="card-body">
                                <form action="{{route('item.add')}}" method="post" id="add-item">  
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
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
                                                    @if (session('error'))
                                                        <div class="alert alert-danger">
                                                            {{session('error')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="item_id" id="" class="form-control"> 
                                                            @foreach ($items as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                        <label for="inputFirstName">Item</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4" style="display: {{Session::has('cart') ? 'none' : ''}}">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="vendor_id" id="" class="form-control"> 
                                                            @if (Session::has('cart'))
                                                                <option value="{{  Session::get('cart')[0]['vendor_id'] }}" selected></option>
                                                            @endif
                                                            @foreach ($vendors as $vendor)
                                                                <option value="{{ $vendor->id}}">{{$vendor->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="inputFirstName">Vendor</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4" style="display: {{Session::has('cart') ? 'none' : ''}}">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="{{Session::has('cart') ? Session::get('cart')[0]['PO_number'] : ''}}" id="inputFirstName" type="{{Session::has('cart') ? 'hidden' : 'text'}}" name="PO_number" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">PO Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="" id="inputFirstName" type="text" name="quantity" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Quantity</label>
                                                    </div>
                                                </div>
                                                <div class=" col-md-6 mt-4 mb-0">
                                                    <div class="d-grid"><button form="add-item" class="btn btn-info text-white" type="submit">Add Item</button></div>
                                                </div>
                                                <div class=" col-md-6 mt-4 mb-0">
                                                    <div class="d-grid"><a href="{{route('items.complete')}}" class="btn btn-primary">Complete Purchase</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <h4>Items</h4>
                                            @if (Session::has('cart'))
                                            <table class="table table-striped">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">#</th>
                                                    <th>Item </th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Remove</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $totalprice=0; ?>
                                                    @foreach (Session::get('cart') as $id => $item)
                                                        @foreach ($items as $itm)
                                                            @if ($item['item_id'] ==$itm->id)
                                                            <?php $totalprice=$totalprice+$item['price']; ?>
                                                            <tr>
                                                                <th scope="row">{{$itm->id}}</th>
                                                                <td>{{$itm->name}}</td>
                                                                <td>{{$item['quantity']}}</td>
                                                                <td>{{$item['price']}}</td>
                                                                <td><a href="{{route('item.remove',$itm->id)}}"><i class="fa fa-trash text-danger"></i></a></td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                        <tr>
                                                            <th></th>
                                                            <th>Total Price: </th>
                                                            <th>{{$totalprice}}</th>
                                                        </tr>
                                                    
                                                </tbody>
                                            </table>
                                         
                                            @else
                                                Please Add Items
                                            @endif
                                            <div class="d-flex flex-row-reverse bd-highlight">
                                                <div class="p-2 bd-highlight"> <a class="btn btn-primary" href="/admin">Cancel</a></div>
                                            </div>
                                        </div>
                
                                </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
@endsection  