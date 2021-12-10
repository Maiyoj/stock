
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
                            Files
                        <form action="{{ route('csv.file-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                
                                <div class="custom-file text-right"   class="card mb-6">
                                <input type="file" name="file" class="custom-file-input" id="customFile" >
                                <button class="btn btn-primary">Import data</button>
                                <a class="btn btn-success" href="{{ route('csv.file-export') }}">Export data</a>
                        </div>
                       </div>
                            
                        </form>
                        </div>
                       </div>

                  <!-- Add Item -->
                 
                  @can('item-create')

                  <div class="d-flex flex-row-reverse bd-highlight">
                  <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('item.create') }}">Add Item</a></div>
                  </div>
                  @endcan

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
                                             @can('item-edit')
                                         <td><a href="{{route('item.edit', $item->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                         @endcan
                                            <td>
                                                @can('item-delete')
                                                <form action="{{url('item/'.$item->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
                                                </form>
                                                @endcan
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

























