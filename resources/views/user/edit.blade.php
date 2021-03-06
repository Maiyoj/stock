@extends('layouts.main')

@section('title')
<title>Edit User</title>
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
                                Users
                            </div>
                            <div class="card-body">
                                        <form action="{{route('user.update',$user->id)}}" method="post">  
                                            @csrf
                                            @method('PUT')
                                        

                                            @if ($errors->any())
                                            @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                {{$error}}
                                            </div>

                                            @endforeach

                                            @endif
                                            
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="{{$user->name}}" id="inputFirstName" type="text" name="name" placeholder="Enter first name" />
                                                        <label for="inputFirstName">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="{{$user->email}}" id="inputFirstEmail" type="email" name="email" placeholder="Enter email" />
                                                        <label for="inputFirstEmail">Email</label>
                                                    </div>
                                                </div>
                                              
                                                <div class="col-md-8 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstpassword" type="password" name="password" placeholder="Enter password" />
                                                        <label for="inputFirstpassword">Password</label>
                                                    </div>
                                                </div>
                                          

                                                <div class="form-group">
                                      <strong>Role:</strong>
                                      {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control','multiple')) !!}
                                       </div>
                                            <
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