
@extends('layouts.main')

@section('title')
<title>Prices</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Prices</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Prices</li>
                        </ol>

                    




                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Files
                            <form action="{{ route('csv.price-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                    
                                    <div class="custom-file text-right"   class="card mb-6">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" >
                                    <button class="btn btn-primary">Import data</button>
                                    <a class="btn btn-success" href="{{ route('csv.price-export') }}">Export data</a>
                            </div>
                        </div>
                     </div>
                     @can('price-create')
                         <!-- Add price-->
                  <div class="d-flex flex-row-reverse bd-highlight">      
                  <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('price.create') }}">Add Price</a></div>
                  </div>
                  @endcan


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Prices
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
                                            <th>Vendor</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Date Added</th>

                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Vendor</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($prices as $price)
                                        <tr>
                                            <td>{{$price->id}}</td>
                                            <td>{{$price->vendor->name}}</td>
                                            <td>{{$price->item->name}}</td>
                                            
                                            <td>{{$price->price}}</td>
                                             <td>{{$price->created_at}}</td>
                                             @can('price-edit')
                                            <td><a href="{{route('price.edit', $price->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            @endcan
                                            <td>
                                                @can('price-delete')
                                                    
                                               
                                                <form action="{{url('price/'.$price->id)}}" method="post">
                                                @endcan
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
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