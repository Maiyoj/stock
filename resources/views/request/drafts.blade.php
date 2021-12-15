

@extends('front.index')

@section('title')
<title>Request</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4">Request</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Request</li>
                        </ol>



                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Files
                            <form action="{{ route('csv.request-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                    
                                    <div class="custom-file text-right"   class="card mb-6">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" >
                                    <button class="btn btn-primary">Import data</button>
                                    <a class="btn btn-success" href="{{ route('csv.request-export') }}">Export data</a>
                            </div>
                        </div>
                                
                            </form>
                            </div>
                        </div>
 @can('request-create')
<div class="d-flex flex-row-reverse bd-highlight">
<div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('request.create') }}">Add Request</a></div>
</div>
@endcan

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Request
                            </div>
                            <div class="card-body">

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            
                            </div>
                            @endif
                                <table id="datatablesSimple"  >
                             
                                            
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>No. of Items</th>
                                            <th>Status</th>
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
                                                <th>No. of Items</th>
                                             
                                                <th>Status</th>
                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($requests as $request)
                                        <tr>
                                            <td>{{$request->id}}</td>
                                            <td>{{$request->user->name}}</td>
                                            <td>{{$request->zone->zone}}</td>
                                            <td>{{$request->request_item->count()}}</td>
                                            <!-- <td>{{$request->status}}  -->
                                            <td class="{{$request->status=='pending' ? 'text-danger' :'text-success'}}">{{$request->status}}</td>
                                            <td>{{$request->created_at}}</td>
                                             <td><a href="{{route('request.show', $request->id)}}"><i class="fa fa-eye text-primary"> </i></td>
                                        
                                            <td>
                                                @can('request-delete')
                                                <form action="{{url('request/'.$request->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
                                                </form>
                                                @endcan
                                           </td>
                                           @if ($request->draft=='0')
                                           <td><a href="{{route('pm.drafts', $request->id)}}"><i class="btn-btn-primary text-primary">Publish</i></td>
                                          @endif
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