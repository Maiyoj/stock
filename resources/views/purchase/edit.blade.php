@extends('layouts.main')

@section('title')
<title>Edit Purchase Details </title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Purchase Details </li>
                        </ol>
                        <div class="card mb-12">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Purchase Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="{{route('purchase-item.add',$purchase->id)}}" method="post" id="edit-item" enctype="multipart/form-data">  
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
                                                <div class="col-md-12 mt-4" >
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="vendor_id" id="" class="form-control"> 
                                                            @foreach ($vendors as $vendor)
                                                                <option value="{{ $vendor->id}}" {{$purchase->vendor_id ==$vendor->id ? 'selected' : ''}}>{{$vendor->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="inputFirstName">Vendor</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="{{$purchase->PO_number}}" id="inputFirstName" type="text" name="PO_number" placeholder="Enter your PO Number" />
                                                        <label for="inputFirstName">PO Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4" >
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="{{$purchase->date}}" id="date" type="date" name="date" placeholder="Enter date" />
                                                        <label for="inputFirstName">Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4" >
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="" id="note" type="file" name="delivery_note" placeholder="Attach delivery note" />
                                                        <label for="inputFirstName">Delivery Note</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="" id="inputFirstName" type="text" name="quantity" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Quantity</label>
                                                    </div>
                                                </div>
                                                <div class=" col-md-6 mt-4 mb-0">
                                                    <div class="d-grid"><button form="edit-item" class="btn btn-info text-white" type="submit">Add Item</button></div>
                                                </div>
                                                <div class=" col-md-6 mt-4 mb-0">
                                                    <div class="d-grid"><button formaction="{{route('purchase-items.update',$purchase->id)}}" class="btn btn-primary">Update Purchase</button></div>
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
                                        <div class="btn-group dropend">
                                            <button type="button" class=" dropdown-toggle btn-sm position:right"  style=""data-bs-toggle="dropdown" aria-expanded="false">
                                              
                                              <i class="fas fa-bars"></i> </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="{{route('purchase-pdf',$purchase->id)}}">Export to PDF</a></li>
                                              <li><a class="dropdown-item" href="#">Import Excel</a></li>
                                            </ul>
                                          </div> 
                                        <table id="datatablesSimple">
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
                
                                                @foreach ($purchase->purchase_items as $item)
                                                    @foreach ($items as $itm)
                                                        @if ($item->item_id ==$itm->id)
                                                        <tr>
                                                            <th scope="row">{{$itm->id}}</th>
                                                            <td>{{$itm->name}}</td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td>{{$itm->itemprice[0]->price}}</td>
                                                            <td><a href="{{route('purchase-item.remove', $item->id)}}"><i class="fa fa-trash text-danger"> </i></td>
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