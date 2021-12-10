
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
                                Files
                            <form action="{{ route('csv.purchase-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                    
                                    <div class="custom-file text-right"   class="card mb-6">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" >
                                    <button class="btn btn-primary">Import data</button>
                                    <a class="btn btn-success" href="{{ route('csv.purchase-export') }}">Export data</a>
                            </div>
                        </div>
                         </form>
                         </div>
                        </div>
                        @can('purchase-create')
                      <div class="d-flex flex-row-reverse bd-highlight">
                     <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('purchase.create') }}">Add Purchase</a></div>
                     </div>
                     @endcan

                        
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
                                            <th>No of Items</th>
                                            <th>Vendor</th>
                                            <th>PO Number</th>
                                            <th>Price</th>
                                            <th>Date Added</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>No of Items</th>
                                            <th>Vendor</th>
                                            <th>PO Number</th>
                                            <th>Price</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($purchases as $purchase)
                                        <tr>
                                            <td>{{$purchase->id}}</td>
                                            <td>{{$purchase->purchase_items->count()}}</td>
                                            <td>{{$purchase->vendor->name}}</td>
                                            <td>{{$purchase->PO_number}}</td>
                                            <td>{{$purchase->price}}</td>
                                             <td>{{$purchase->created_at}}</td>
                                             
                                            <td><a href="{{route('purchase.show', $purchase->id)}}"><i class="fa fa-eye text-primary"> </i></td>
                                            <td>
                                            {{-- <form id= "delete" action="{{route('purchase.destroy', $purchase->id)}}" method="post">
                                                 @csrf
                                                @method('DELETE')    
                                                <button type="submit" form="delete" style="border: none;background:color:transparent;"> 
                                                    <i class="fa fa-trash text-danger"></i>
                                                </button> 
                                            </form> --}}
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