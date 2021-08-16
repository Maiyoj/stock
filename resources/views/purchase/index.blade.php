@extends('layouts.main')

@section('title')
<title>Purchases</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Purchases</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Purchases</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Items
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
                                            <th>item</th>
                                            <th>vendor</th>
                                            <th>P.O number</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <<th>ID</th>
                                            <th>item</th>
                                            <th>vendor</th>
                                            <th>P.O number</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($purchases as $purchase)
                                        <tr>
                                            <td>{{$purchase->id}}</td>
                                            <td>{{$purchase->item_id}}</td>
                                            <td>{{$purchase->vendor_id}}</td>
                                            <td>{{$purchase->PO Number}}</td>
                                            <td>{{$purchase->Quatity}}</td>
                                            <td>{{$purchase->Total price}}</td>

                                             <td>{{$purchase->created_at}}</td>
                                            <td><a href="{{route('purchase.edit', $purchase->id)}}"><i class="fa fa-edit text-primary"> </i</td>
                                            <td>
                                            <form id= "delete" action="{{route('purchase.destroy', $purchase->id)}}" method="post">
                                             @csrf
                                             @method('DELETE')    
                                             <button type="submit" form="delete" style="border: none;background:color:transparent;">  
             </form>
                                      <i class="fa fa-trash text-danger"></i</td>
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