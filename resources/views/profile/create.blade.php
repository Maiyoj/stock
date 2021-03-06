@extends('layouts.main')

@section('title')
<title>My Profile</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Update Profile</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                               Profile
                            </div>
                            <div class="card-body">
                                        <form action="{{route('profile.store')}}" method="post">  
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
                                     
                                            <div class="col-md-8 mt-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" type="text" name="name" value="{{$user->name}}" placeholder="Enter your first name" />
                                                    <label for="inputFirstName">Name</label>
                                                </div>
                                            </div>
                                               
                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="inputFirstName" type="email" name="email" value="{{$user->email}}"  placeholder="name@example.com"  />
                                                            <label for="inputFirstName"> Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="inputFirstName" type="address" value="{{$user->role_id==0 ? 'Admin': ($user->role_id==1 ? 'Team Lead':'Engineer')}}" placeholder="Enter your first name" />
                                                            <label for="inputFirstName">Role</label>
                                                        </div>
                                                    </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Update Profile</a></div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                        
                    </div>
                </main>
@endsection  