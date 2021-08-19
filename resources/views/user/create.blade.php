@extends('layouts.main')

@section('title')
<title>Add User</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add User</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Users
                            </div>
                            <div class="card-body">
                                        <form action="{{route('user.store')}}" method="post">  
                                            @csrf
                                        

                                            @if ($errors->any())
                                            @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                {{$error}}
                                            </div>

                                            @endforeach

                                            @endif
                                            
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter first name" />
                                                        <label for="inputFirstName">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstEmail" type="email" name="email" placeholder="Enter email" />
                                                        <label for="inputFirstEmail">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="role_id" id="" class="form-control"> 
                                                            <option value="1">Team Lead</option>
                                                            <option value="2">Engineer</option>
                                                        </select>
                                                        <label for="inputFirstName">Role</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstpassword" type="password" name="password" placeholder="Enter password" />
                                                        <label for="inputFirstpassword">Password</label>
                                                    </div>
                                                </div>
                                          
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Add User</a></div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  