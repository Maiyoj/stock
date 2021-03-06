@extends('layouts.main')

@section('title')
<title>Add Issuances</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"> Issuances</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Issuances</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                             Issuances
                            </div>
                            <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            @endif
                                        <form action="{{route('engineer-issuancee.store')}}" method="post">  
                                            @csrf
                                            <div class="row mb-3">
                                            <div class="col-md-8">

                                            @if ($errors->any())
                                            @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                {{$error}}
                                        </div>

                                            @endforeach

                                            @endif
                                            
                

                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="user_id" id="" class="form-control"> 
                                                            @foreach ($users as $user)
                                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                        <label for="inputFirstName">User</label>
                                                    </div>
                                                </div>
                                                

                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <select name="zone_id" id="" class="form-control"> 
                                                                @foreach ($zones as $zone)
                                                                    <option value="{{$zone->id}}">{{$zone->zone}}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="inputFirstName">Zone</label>
                                                        </div>
                                                    </div>




                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <select name="item_id" id="" class="form-control"> 
                                                                @foreach ($items as $item)
                                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                            <label for="inputFirstName">Item</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <select name="purpose" id="" class="form-control"> 
                                                        
                                                          <option value="Deployment">Deployment</option>
                                                          <option value="Support">Support</option>
                                                          <option value="Survey">Survey</option>
                                                            
                                                            </select>

                                                            <label for="inputFirstName">Purpose</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" value="" id="inputFirstName" type="text" name="quantity" placeholder="Enter your first name" />
                                                            <label for="inputFirstName">Quantity</label>
                                                        </div>
                                                    </div>      
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Add Issuance</a></div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  