

@extends('front.index')

@section('title')
<title>Returns</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <form action="{{ route('csv.returns-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" >
                              <div class="text-left">
                               <a class="btn btn-success"  href="{{ route('csv.returns-export') }}">Export data</a>
                              </div>
                               </div>
                        </form>
                        @can('returns-create')
               <div class="d-flex flex-row-reverse bd-highlight">
               <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('returns.create') }}">Add Item</a></div>
               </div>
              @endcan

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Returns
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
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item</th>
                                                <th>User</th>
                                                <th>Zone</th>
                                                <th>Quantity</th>

                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($returnss as $returns)
                                        <tr>
                                            <td>{{$returns->id}}</td>
                                            <td>{{$returns->user->name}}</td>
                                            <td>{{$returns->zone->zone}}</td>
                                            <td>{{$returns->item->name}}</td>
                                            <td>{{$returns->quantity}}</td>
                                             <td>{{$returns->created_at}}</td>
                                           <!-- <td><a href="{{route('returns.edit', $returns->id)}}"><i class="fa fa-edit text-primary"> </i></td>-->
                                            <td>
                                                @can('returns-delete')
                                                <form action="{{url('returns/'.$returns->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
                                                </form>
                                                @endcan
                                    
                                     </td>
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