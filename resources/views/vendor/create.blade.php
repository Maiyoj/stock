@extends('layouts.main')

@section('title')
<title>Add Vendor</title>
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
                                Vendors
                            </div>
                            <div class="card-body">
                                        <form action="{{route('vendor.store')}}" method="post">  
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
                                                    <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter your first name" />
                                                    <label for="inputFirstName"> Name</label>
                                                </div>
                                            </div>
                                               
                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="inputFirstName" type="email" name="email" placeholder="name@example.com"  />
                                                            <label for="inputFirstName"> Email</label>
                                                        </div>
                                                    </div>
                                                        <div class="col-md-8 mt-4">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" id="inputFirstName" type="number" name="number" placeholder="Enter your first name" />
                                                                <label for="inputFirstName">Number</label>
                                                            </div>
                                                        </div>
                                                

                                                            <div class="col-md-8 mt-4">
                                                                <div class="form-floating mb-3 mb-md-0">
                                                                    <input class="form-control" id="inputFirstName" type="address" name="address" placeholder="Enter your first name" />
                                                                    <label for="inputFirstName">Address</label>
                                                                </div>
                                                            </div>

                                          

                                                                <div class="col-md-8 mt-4">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <input class="form-control" id="inputFirstName" type="country" name="country" placeholder="Enter your first name" />
                                                                        <label for="inputFirstName">Country</label>
                                                                    </div>
                                                                </div>
{{--     
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Add Vendor</a></div>
                                            </div> --}}

                                            <div class="col-md-8 mt-4">
                                                <div class="d-grid gap-2 col-4 mx-auto">
                                               <div class="col">
                                               <button type="submit" class="btn btn-primary">Save</button>
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