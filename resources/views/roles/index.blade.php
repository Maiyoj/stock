
@extends('layouts.main')

@section('title')
<title>Roles</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Roles</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                     <div class="card mb-4">
                        <div class="card-header">
                            <i class="fab fa-product-hunt"></i>
                            Files
                        <form action="{{ route('csv.file-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                
                                <div class="custom-file text-right"   class="card mb-6">
                                <input type="file" name="file" class="custom-file-input" id="customFile" >
                                <button class="btn btn-primary">Import data</button>
                                <a class="btn btn-success" href="{{ route('csv.file-export') }}">Export data</a>
                        </div>
                       </div>    
                        </form>
                        </div>
                       </div>
                       @can('role-create')
                    <div class="d-flex flex-row-reverse bd-highlight">
                  <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('roles.create') }}">Add Role</a></div>
                  </div>
                  @endcan

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Roles
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
                                             @can('role-show')
                                             <td><a href="{{route('roles.show', $role->id)}}"><i class="fa fa-eye text-primary"> </i></td>
                                                @endcan
                                                @can('role-edit')
                                            <td><a href="{{route('roles.edit', $role->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                                @endcan
                                                @can('role-delete')
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
                            </div>
                        </div>
                    </div>
                </main>
@endsection  






























