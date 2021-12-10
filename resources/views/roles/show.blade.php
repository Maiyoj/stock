@extends('layouts.main')

@section('title')
<title>Show Roles Details </title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Show Roles Details </li>
                        </ol>
                        <div class="card mb-12">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Permission details 
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="" method="post">  
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
                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{session('success')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="card-body">
                <div class="lead">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
                <div class="lead">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $permission)
                            <label class="badge bg-success">{{ $permission->name }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
@endsection  