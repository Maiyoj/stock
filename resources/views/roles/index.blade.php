
@extends('layouts.main')

@section('title')
<title>Roles</title>
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
                                Action
                                </div>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                    <div class="p-2 bd-highlight"><a href="" class="btn btn-danger"  id="deleteAllSelectedRecord" >Delete Selected</a></div>
                                    <div class="p-2 bd-highlight">   <a class="btn btn-success" href="{{ route('csv.user-export') }}">Export data</a></div>
                                    @can('role')
                                <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('roles.create') }}">Add Roles</a></div>
                                @endcan
                                
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="btn-group dropend">
                                    <button type="button" class=" dropdown-toggle btn-sm position:right"  style=""data-bs-toggle="dropdown" aria-expanded="false">
                                      
                                      <i class="fas fa-bars"></i> </button>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Export to PDF</a></li>
                                      <li><a class="dropdown-item" href="#">Import Excel</a></li>
                                    </ul>
                                  </div> 
                            </div>
                            <div class="card-body">

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            
                            </div>
                            @endif
                            
                                <table id="datatablesSimple">
                                     <thead>
                                        <tr>
                                             <th>ID</th>
                                            <th>name</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>ID</th>
                                            <th>name</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($roles as $role)
                                        <tr>
                                           <td> {{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                           
                                             <td>{{$role->created_at}}</td>
                                             @can('role')
                                             <td><a href="{{route('roles.show', $role->id)}}"><i class="fa fa-eye text-primary"> </i></td>
                                                @endcan
                                                @can('role')
                                            <td><a href="{{route('roles.edit', $role->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                                @endcan
                                                @can('role')
                                            <td>
                                                <form action="{{url('roles/'.$role->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
                                                </form>
                                            </td>
                                            @endcan
                                            </tr>     
                                            
                                            
                                           
                                        @empty
                                        

                                        @endforelse
                                  
                                        
                                       
                                    </tbody>
                                   
                                </table>
                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <div class="p-2 bd-highlight"> <a class="btn btn-primary" href="/admin">Go Back</a></div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection  






























