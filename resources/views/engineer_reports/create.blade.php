@extends('front.index')

@section('title')
<title>Add Report</title>
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
                                Add Report
                            </div>
                            <div class="card-body">
                                        <form action="{{route('engineer_reports.store')}}" method="post" enctype="multipart/form-data">  
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
                                            
            
                                
                                    <div class="col-md-8  mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="site_name" placeholder="Enter site name" />
                                            <label for="inputFirstName">Site Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8  mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputName" type="text" name="client_name" placeholder="Enter client name" />
                                            <label for="inputFirstName">Client Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4" >
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="number" name="allocated_quantity" placeholder="Enter allocated quantity" />
                                            <label for="inputFirstName">Allocated Quantity</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4" >
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="number" name="used_quantity" placeholder="Enter used quantity" />
                                            <label for="inputFirstName">Used Quantity</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4" >
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="number" name="remaining_quantity" placeholder="Enter remaining quantity" />
                                            <label for="inputFirstName">Remaining Quantity</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="file" name="document" placeholder="Attach document" />
                                            <label for="inputFirstName">Document</label>
                                        </div>
                                    </div>
                                            {{-- <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Add Item</a></div>
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