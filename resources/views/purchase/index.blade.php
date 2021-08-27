
@extends('layouts.main')

@section('title')
<title>Purchase</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Purchase</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Purchase</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Purchase
                            </div>
                            <div class="card-body">

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            
                            </div>
                            @endif
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Item</th>
                                            <th>Vendor</th>
                                            <th>PO Number</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Date Added</th>

                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Item</th>
                                            <th>Vendor</th>
                                            <th>PO Number</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($purchases as $purchase)
                                        <tr>
                                            <td>{{$purchase->id}}</td>
                                            <td>{{$purchase->item->name}}</td>
                                            <td>{{$purchase->vendor->name}}</td>
                                            <td>{{$purchase->PO_number}}</td>
                                            <td>{{$purchase->quantity}}</td>
                                            <td>{{$purchase->price}}</td>
                                             <td>{{$purchase->created_at}}</td>
                                            <td><a href="{{route('purchase.edit', $purchase->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            <td>
                                            <form id= "delete" action="{{route('purchase.destroy', $purchase->id)}}" method="post">
                                                 @csrf
                                                @method('DELETE')    
                                                <button type="submit" form="delete" style="border: none;background:color:transparent;"> 
                                                    <i class="fa fa-trash text-danger"></i>
                                                </button> 
                                            </form>
                                     </td>
                                            </tr>                                                           
                                        @empty
                                        

                                        @endforelse
                                  
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection  