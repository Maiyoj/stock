

@extends('front.index')

@section('title')
<title>Request Approval</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4"> </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Request Approval
                            </div>
                            <div class="card-body">

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            
                            </div>
                            @endif
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>No. of Items</th>
                                            <th>Purpose</th>
                                            <th>Date Added</th>
                                            <th>Status</th>
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
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($requestengineer as $requestengineer)
                                        <tr>
                                            <td>{{$requestengineer->id}}</td>
                                            <td>{{$requestengineer->user->name}}</td>
                                            <td>{{$requestengineer->zone->zone}}</td>
                                            <td>{{$requestengineer->erequests_item->count()}}</td>
                                            <td>{{$requestengineer->purpose}}</td>
                                            <td class="{{$requestengineer->status=='pending' ? 'text-danger' :'text-success'}}">{{$requestengineer->status}}</td>
                                            <td>{{$requestengineer->created_at}}</td>
                                            @can('approval-show')
                                            <td><a href="{{route('requestengineer.show', $requestengineer->id)}}"><i class="fa fa-eye text-primary"> </i></td>
                                                @endcan
                                                @if ($requestengineer->status=='pending')
                                                {{-- <td><a href="{{route('requestengineer.approvee', $requestengineer->id)}}"><i class="fa fa-check text-primary"> </i></td> --}}
                                                    <td><a href="{{route('requestengineer.approvee', $requestengineer->id)}}"><i class="btn-btn-primary text-danger"  type="submit">Approve</i></td>  
                                                    <td><a href="#"><i class="btn-btn-primary text-danger"  type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal">Reject</i></td>  
                                                {{-- <td><a href="{{route('requestengineer.rejected', $requestengineer->id)}}"><i class="fa fa-times text-danger"> </i></td> --}}
                                             @endif

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

 {{-- Comments form --}}
                    
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Enter Comments</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- <form class="form-group" action="requestengineer.rejected/{{$requestengineer->id}}" method="post" id="requestengineer.rejected/{{$requestengineer->id}}"> --}}
            <form action="{{route('requestengineer.rejected',  $requestengineer->id)}}" method="HEAD">  
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
                <div class="form-floating mb-3 mb-md-0">
            <textarea rows = "5" cols = "50" name = "comment"></textarea>
                </div>
                </div>
           <div class="modal-footer">
            {{-- <td><a href="{{route('comments.store', $request->id)}}"><i class="btn-btn-primary text-danger"  type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal">Submit Comment</i></td>   --}}

          <button type="submit" class="btn btn-primary">Save changes</button> 
        </form>
        </div>
      </div>
    </div>
  </div>


                </main>
@endsection  