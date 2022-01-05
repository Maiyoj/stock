
@extends('layouts.main')

@section('title')
<title>Add Vendor</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Vendor</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Vendor</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Vendors
                            </div>
                            <div class="card-body">
                                        <form action="{{route('vendor.update', $vendor->id)}}" method="post">  
                                            @csrf
                                            @method('PATCH')
                                            <div class="row mb-3">
                                            <div class="col-md-8">

                                            @if ($errors->any())
                                            @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                {{$error}}
                                        </div>

                                            @endforeach

                                            @endif
                                            
                                            <div class="col-md-8 mt-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select name="title" id="" class="form-control"> 
                                                
                                                  <option value="Company">Company</option>
                                                  <option value="Mr">Mr</option>
                                                  <option value="Mrs">Mrs</option>
                                                  <option value="Miss">Miss</option>
                                                  <option value="Dr">Dr</option>
                                                  <option value="Sir">Sir</option>
                                                    </select>
    
                                                   <label for="inputFirstName">Tittle</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-8 mt-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter your first name"  value="{{$vendor->name}}" />
                                                    <label for="inputFirstName"> Vendor Name</label>
                                                </div>
                                            </div>
                                               
                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="inputFirstName" type="email" name="email" placeholder="name@example.com"   value="{{$vendor->email}}" />
                                                            <label for="inputFirstName"> Vendor Email</label>
                                                        </div>
                                                    </div>
                                                        <div class="col-md-8 mt-4">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" id="inputFirstName" type="number" name="number" placeholder="Enter your first name"   value="{{$vendor->number}}"/>
                                                                <label for="inputFirstName">Vendor Number</label>
                                                            </div>
                                                        </div>
                                                

                                                            <div class="col-md-8 mt-4">
                                                                <div class="form-floating mb-3 mb-md-0">
                                                                    <input class="form-control" id="inputFirstName" type="address" name="address" placeholder="Enter your first name"  value="{{$vendor->address}}" />
                                                                    <label for="inputFirstName">vendor Address</label>
                                                                </div>
                                                            </div>

                                          

                                                                <div class="col-md-8 mt-4">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <input class="form-control" id="inputFirstName" type="country" name="country" placeholder="Enter your first name"  value="{{$vendor->country}}" />
                                                                        <label for="inputFirstName">Country</label>
                                                                    </div>
                                                                </div>
    
                                               
                                          
                                                                <div class="col-md-8 mt-4">
                                                                    <div class="d-grid gap-2 col-4 mx-auto">
                                                                   <div class="col">
                                                                   <button type="submit" class="btn btn-success">Save</button>
                                                                   <a class="btn btn-danger" href="/admin">Cancel</a>
                                                                   </div>
                                                                   </div>
                                                                   </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  