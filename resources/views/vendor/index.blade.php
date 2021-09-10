

@extends('layouts.main')

@section('title')
<title>Add Vendor</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Vendor</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Vendor</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Vendors
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
                                            <th> Vendor Title</th>
                                            <th> Vendor Name</th>
                                            <th> Vendor Email</th>
                                            <th>Vendor Number</th>
                                            <th>Vendor Address</th>
                                            <th>Vendor Country</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        
                                            <th>ID</th>
                                            <th> Vendor Title</th>
                                            <th> Vendor Email</th>
                                            <th>Vendor Name</th>
                                            <th>Vendor Number</th>
                                            <th>Vendor Address</th>
                                            <th>Vendor Country</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($vendors as $vendor)
                                        <tr>
                                            <td>{{$vendor->id}}</td>
                                            <td>{{$vendor->title}}</td>
                                            <td>{{$vendor->name}}</td>
                                            <td>{{$vendor->email}}</td>
                                            <td>{{$vendor->number}}</td>
                                            <td>{{$vendor->address}}</td>
                                            <td>{{$vendor->country}}</td>
                                            <td>{{$vendor->created_at}}</td>
                                            <td><a href="{{route('vendor.edit', $vendor->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            <td>
                                            <form id= "delete" action="{{route('vendor.destroy', $vendor->id)}}" method="post">
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