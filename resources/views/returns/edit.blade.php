@extends('front.index')

@section('title')
<title>Edit Returns</title>
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
                             Returns
                            </div>
                            <div class="card-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                @endif
                                        <form action="{{route('returns.update',$returns->id)}}" method="post">  
                                            @csrf
                                            @method('PUT')
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
                                                                <option value="{{$user->id}}" {{$user->id==$returns->user_id ? 'selected':''}}>{{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                        <label for="inputFirstName">User</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="zone_id" id="" class="form-control"> 
                                                            @foreach ($zones as $zone)
                                                                <option value="{{$zone->id}}" {{$zone->id==$returns->zone_id ? 'selected': ''}}>{{$zone->zone}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="inputFirstName">Zone</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="item_id" id="" class="form-control"> 
                                                            @foreach ($items as $item)
                                                                <option value="{{$item->id}}" {{$item->id==$returns->item_id ? 'selected':''}}>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                        <label for="inputFirstName">Item</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="{{$returns->quantity}}" id="inputFirstName" type="text" name="quantity" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Quantity</label>
                                                    </div>
                                                </div>    
                                                  

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Update Issuance</a></div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  