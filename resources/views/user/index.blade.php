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
                                           <td>{{$user->role_id==0 ? 'Admin': ($user->role_id=1 ? 'Team lead' : 'Engineer')}}</td>
                                             <td>{{$user->created_at}}</td>
                                            <td><a href="{{route('user.edit', $user->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            <td>
                                            <form id= "delete" action="{{route('user.destroy', $user->id)}}" method="post">
                                             @csrf
                                             @method('DELETE')    
                                             <button type="submit" form="delete" style="border: none;background:color:transparent;">  
             </form>
                                      <i class="fa fa-trash text-danger"></i></td>
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