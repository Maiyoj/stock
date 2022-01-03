@extends('layouts.main')

@section('title')
<title>Add Zone</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Zones</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Zone</li>
                        </ol>
                        {{-- <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Files
                            <form action="{{ route('csv.zone-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                    
                                    <div class="custom-file text-right"   class="card mb-6">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" >
                                    <button class="btn btn-primary">Import data</button>
                                    <a class="btn btn-success" href="{{ route('csv.zone-export') }}">Export data</a>
                                    <a href="" class="btn btn-danger"  id="deleteAllSelectedRecord" >Delete Selected</a>
                            </div>
                        </div>
                        </form>
                        </div>
                        </div>
 --}}
 <div class="card mb-4">
    <div class="card-header">
        <i class="fab fa-product-hunt"></i>
        Actions
       
            <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight"><a href="" class="btn btn-danger"  id="deleteAllSelectedRecord" >Delete Selected</a></div>
            <div class="p-2 bd-highlight">  <a class="btn btn-success" href="{{ route('csv.zone-export') }}">Export data</a></div>
            @can('zone-create')
        <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('zone.create') }}">Add Zone</a></div>
        @endcan
        </div>


    </div>
</div>
 <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Zones
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
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr></tr>
                                        <th><input type="checkbox" id="chkCheckAll"></th>
                                        <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Zone</th>
                                        <th>Date Added</th>
                                         <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($zones as $zone)
                                        <tr>
                                            <tr id="sid{{$zone->id}}"></tr>
                                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$zone->id}}"></td>
                                            <td>{{$zone->id}}</td>
                                            <td>{{$zone->user->name}}</td>
                                            <td>{{$zone->zone}}</td>
                                             <td>{{$zone->created_at}}</td>
                                             @can('zone.edit')
                                             <td><a href="{{route('zone.edit', $zone->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                            @endcan
                                             <td>
                                                 @can('zone-delete')
                                                <form action="{{url('zone/'.$zone->id)}}" method="post">
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
                                                </form>
                                     </td>
                                     </tr>                                                           
                                        @empty
                                        @endforelse
                                  
                                        
                                       
                                    </tbody>
                                </table>
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
                       
                           url:"{{route('zone.delete')}}",
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