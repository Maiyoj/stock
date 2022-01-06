





@extends('layouts.main')

@section('title')
<title>Add Item</title>
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
                                Items
                            </div>
                            <div class="card-body">
                                        <form action="{{route('permissions.update', $permission->id)}}" method="post">  
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
                                            </div> 
                                          
                                    <div class="col-md-8 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter your first name" value="{{$permission->name}}" />
                                            <label for="inputFirstName">Name</label>
                                        </div>
                                    </div>
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