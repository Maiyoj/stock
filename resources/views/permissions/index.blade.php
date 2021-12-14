
@extends('layouts.main')

@section('title')
<title>Permission</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Permission</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Permission</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Files
                             <form action="{{ route('csv.price-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                               @can('permission-create')
                                <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                    
                                    <!-- <div class="custom-file text-right"   class="card mb-6">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" >
                                    <button class="btn btn-primary">Import data</button> -->
                                    <a class="btn btn-primary" href="{{ route('permissions.create') }}">Add Permissions</a>
                            </div>
                        </div>
                        @endcan
                         
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                permissions
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
                                            <th>Name</th>
                                            <th>Date Added</th>

                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($permission as $permission)
                                        <tr>
                                            <td>{{$permission->id}}</td>
                                            <td>{{$permission->name}}</td>
                                            
                                             <td>{{$permission->created_at}}</td>

                                             @can('permission-edit')
                                            <td><a href="{{route('permissions.edit', $permission->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                                @endcan
                                                @can('permission-delete')
                                            <td>
                                                <form action="{{url('permissions/'.$permission->id)}}" method="post">
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