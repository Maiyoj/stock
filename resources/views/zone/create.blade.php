@extends('layouts.main')

@section('title')
<title>Add Zones</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Zone</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Zones</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Zones
                            </div>
                            <div class="card-body">
                                        <form action="{{route('zone.store')}}" method="post">  
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
                                                    <select name="user_id" id="" class="form-control"> 
                                                        @foreach ($users as $user)
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    <label for="inputFirstName">User</label>
                                                </div>
                                            </div>

                                                

                                                    <div class="col-md-8 mt-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="inputFirstName" type="text" name="zone" placeholder="Enter your first name" />
                                                            <label for="inputFirstName">Zone</label>
                                                        </div>
                                                    </div>

                                        
                                          
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit">Add Zone</a></div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  