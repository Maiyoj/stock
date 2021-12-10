@extends('layouts.main')

@section('title')
<title>Add User</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Name</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Name</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Files
                            <form action="{{ route('csv.user-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                    
                                    <div class="custom-file text-right"   class="card mb-6">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" >
                                    <button class="btn btn-primary">Import data</button>
                                    <a class="btn btn-success" href="{{ route('csv.user-export') }}">Export data</a>
                            </div>
                        </div>
                        </form>
                        </div>
                        </div>

                  <div class="d-flex flex-row-reverse bd-highlight">
                  <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('user.create') }}">Add User</a></div>
                  </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Users
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
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                           <td> @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $val)
                                            <label class="badge bg-dark">{{ $val }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                            <td><a href="{{route('user.edit', $user->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            <td>
                                                <form action="{{url('user/'.$user->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
                                                        
                                                </form>
                                  
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