

@extends('layouts.main')

@section('title')
<title>Returns</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4">Returns</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Returns</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Returns
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
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item</th>
                                                <th>User</th>
                                                <th>Zone</th>
                                                <th>Quantity</th>

                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($returnss as $returns)
                                        <tr>
                                            <td>{{$returns->id}}</td>
                                            <td>{{$returns->user->name}}</td>
                                            <td>{{$returns->zone->zone}}</td>
                                            <td>{{$returns->item->name}}</td>
                                            <td>{{$returns->quantity}}</td>
                                             <td>{{$returns->created_at}}</td>
                                            <td><a href="{{route('returns.edit', $returns->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            <td>
                                            <form id= "delete" action="{{route('returns.destroy', $returns->id)}}" method="post">
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