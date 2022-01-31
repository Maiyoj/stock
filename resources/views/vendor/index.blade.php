

@extends('layouts.main')

@section('title')
<title>Add Vendor</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        {{-- <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Files
                            <form action="{{ route('csv.vendor-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                    
                                    <div class="custom-file text-right"   class="card mb-6">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" >
                                    <button class="btn btn-primary">Import data</button>
                                    <a class="btn btn-success" href="{{ route('csv.vendor-export') }}">Export data</a>
                                    <a href="" class="btn btn-danger"  id="deleteAllSelectedRecord" >Delete Selected</a>
                            </div>
                        </div>    
                        </form>
                        </div>
                        </div> --}}

                 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Actions
                            </div>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                    <div class="p-2 bd-highlight"><a href="" class="btn btn-danger"  id="deleteAllSelectedRecord" >Delete Selected</a></div>
                                    <div class="p-2 bd-highlight"> <a class="btn btn-success" href="{{ route('csv.vendor-export') }}">Export data</a></div>
                                    @can('vendor')
                                <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('vendor.create') }}">Add Vendor</a></div>
                                @endcan
                                </div>
                            </div>
                        
           <!-- Add Vendor-->
    
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="btn-group dropend">
                                    <button type="button" class=" dropdown-toggle btn-sm position:right"  style=""data-bs-toggle="dropdown" aria-expanded="false">
                                      
                                      <i class="fas fa-bars"></i> </button>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="{{route('vendor-pdf')}}">Export to PDF</a></li>
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
                                            <tr></tr>
                                            <th><input type="checkbox" id="chkCheckAll"></th>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                            <th>Address</th>
                                            <th>Country</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <tr></tr>
                                            <th><input type="checkbox" id="chkCheckAll"></th>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Number</th>
                                            <th>Address</th>
                                            <th>Country</th>
                                            <th>Date Added</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($vendors as $vendor)
                                        <tr>
                                            <tr id="sid{{$vendor->id}}"></tr>
                                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$vendor->id}}"></td>
                                            <td>{{$vendor->id}}</td>
                                            <td>{{$vendor->title}}</td>
                                            <td>{{$vendor->name}}</td>
                                            <td>{{$vendor->email}}</td>
                                            <td>{{$vendor->number}}</td>
                                            <td>{{$vendor->address}}</td>
                                            <td>{{$vendor->country}}</td>
                                            <td>{{$vendor->created_at}}</td>
                                            @can('vendor')
                                            <td><a href="{{route('vendor.edit', $vendor->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            @endcan
                                            <td>
                                                @can('vendor')
                                                <form action="{{url('vendor/'.$vendor->id)}}" method="post">
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
                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <div class="p-2 bd-highlight"> <a class="btn btn-primary" href="/admin">Go Back</a></div>
                                  </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(function(e)
   {
       $("#chkCheckAll").click(function(){
           $(".checkBoxClass").prop('checked', $(this).prop('checked'));
   
       });
   
   $("#deleteAllSelectedRecord").click(function(e){
   
    e.preventDefault();
    var allids = [];  
      $("input:checkbox[name=ids]:checked").each(function(){
   
       allids.push($(this).val());
      });

    
      $.ajax({
   
       url:"{{route('vendor.delete')}}",
       type:"DELETE",
       data:{
           _token:$("input[name=_token]").val(),
        ids:allids
       },
       success:function(response){
           $.each(allids, function(key,val){
            $("#sid"+val).remove();  
            alert(response.success);
            location.reload(true); 

           
           })
       }
      });
   
   })
   
   
       });
   
        
                    
                    </script>




                </main>
@endsection  