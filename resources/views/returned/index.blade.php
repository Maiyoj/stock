

@extends('front.index')

@section('title')
<title>Returns</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4">Returns</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Returns</li>
                        </ol>
                          <form action="{{ route('csv.returned-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" >
                              <div class="text-left">
                               <a class="btn btn-success"  href="{{ route('csv.returned-export') }}">Export data</a>
                              </div>
                               </div>
                        </form>
                        @can('ereturns-create')
               <div class="d-flex flex-row-reverse bd-highlight">
               <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('returned.create') }}">Add Item</a></div>
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
                                        @forelse($returneds as $returned)
                                        <tr>
                                            <td>{{$returned->id}}</td>
                                            <td>{{$returned->user->name}}</td>
                                            <td>{{$returned->zone->zone}}</td>
                                            <td>{{$returned->item->name}}</td>
                                            <td>{{$returned->quantity}}</td>
                                             <td>{{$returned->created_at}}</td>
                                            
                                            <!--<td><a href="{{route('returned.edit', $returned->id)}}"><i class="fa fa-edit text-primary"> </i></td>-->
                                            <td>
                                                @can('ereturns-delete')
                                                <form action="{{url('returned/'.$returned->id)}}" method="post">
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