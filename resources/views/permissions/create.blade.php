@extends('layouts.main')

@section('title')
<title>Add Item</title>
@endsection
@section('content') 

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Permission</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Permissions</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Permissions
                            </div>
                            <div class="card-body">
                                        <form action="{{route('permissions.store')}}" method="post">  
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
                                    <div class="form-group" >
                                     <label for="roles_permissions">Add Permissions</label>
                               <input type="text" data-role="tagsinput" name="name" name="roles_permissions" class="form-control" id="roles_permissions" value="{{ old('roles_permissions') }}">   
                                </div>     

                                    </div>
                              
                              
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Add Permission</a></div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  