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

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            
                            </div>
                            @endif
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                             <th>ID</th>
                                             <th>Type</th>
                                            <th>name</th>
                                            <th>Description</th>
                                            <th>Units</th>
                                            <th>SKU</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                           <th>name</th>
                                           <th>Description</th>
                                           <th>Units</th>
                                           <th>SKU</th>
                                           <th>Date Added</th>
                                           <th>Action</th>
                                        
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($items as $item)
                                        <tr>
                                           <td> {{$item->id}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->units}}</td>
                                            <td>{{$item->sku}}</td>
                                             <td>{{$item->created_at}}</td>
                                            <td><a href="{{route('item.edit', $item->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            <td>
                                            <form id= "delete" action="{{route('item.destroy', $item->id)}}" method="post">
                                             @csrf
                                             @method('DELETE')    
                                             <button type="submit" form="delete" style="border: none;background:color:transparent;">  
                                      </form>
                                      <i class="fa fa-trash text-danger"></i></td>
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