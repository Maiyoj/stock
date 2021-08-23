

@extends('layouts.main')

@section('title')
<title>Issuances Engineer</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Issuance  Engineer</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Engineer Issuances</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Issuances
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
                                            <th>Purpose</th>
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
                                                <th>Purpose</th>
                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($issuancees as $issuancee)
                                        <tr>
                                            <td>{{$issuancee->id}}</td>
                                            <td>{{$issuancee->user->name}}</td>
                                            <td>{{$issuancee->zone->zone}}</td>
                                             <td>{{$issuancee->item->name}}</td>
                                            <td>{{$issuancee->quantity}}</td>
                                            <td>{{$issuancee->purpose}}</td>
                                             <td>{{$issuancee->created_at}}</td>
                                            <td><a href="{{route('issuancee.edit', $issuancee->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            <td>
                                            <form id= "delete" action="{{route('issuancee.destroy', $issuancee->id)}}" method="post">
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