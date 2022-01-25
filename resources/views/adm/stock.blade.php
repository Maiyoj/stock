

@extends('layouts.main')

@section('title')
<title>My Stock</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Stock
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
                                            <th>Quantity</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($stocks as $stock)
                                        <tr>
                                            <td>{{$stock->id}}</td>
                                            <td>{{$stock->item->name}}</td>
                                            <td>{{$stock->quantity}}</td>
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