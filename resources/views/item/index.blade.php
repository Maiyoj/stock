
@extends('layouts.main')

@section('title')
<title>Add Item</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Items</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Items</li>
                        </ol>
                     {{-- <div class="card mb-4">
                        <div class="card-header">
                            <i class="fab fa-product-hunt"></i>
                            Files
                        <form action="{{ route('csv.file-import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-10" style="max-width: 400px; margin: 5 ;">
                                
                                <div class="custom-file text-right"   class="card mb-6">
                                <input type="file" name="file" class="custom-file-input" id="customFile" >
                                <button class="btn btn-primary">Import data</button>
                                <a class="btn btn-success" href="{{ route('csv.file-export') }}">Export data</a>
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
                           
                                <div class="d-flex flex-row bd-highlight mb-3">
                                <div class="p-2 bd-highlight"><a href="" class="btn btn-danger"  id="deleteAllSelectedRecord" >Delete Selected</a></div>
                                <div class="p-2 bd-highlight"> <a class="btn btn-success" href="{{ route('csv.file-export') }}">Export data</a></div>
                                @can('item-create')
                            <div class="p-2 bd-highlight"><a class="btn btn-primary" href="{{ route('item.create') }}">Add Item</a></div>
                            @endcan
                            </div>


                        </div>
                    </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Items 
                            </div>
                        
                            <div class="card-body">

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            
                            </div>
                            @endif
                              <!-- Add Item -->
                
                                <table id="datatablesSimple">
                                     <thead>
                                        <tr>
                                            <tr></tr>
                                            <th><input type="checkbox" id="chkCheckAll"></th>
                                             <th>ID</th>
                                             <th>Type</th>
                                            <th>name</th>
                                            <th>Description</th>
                                            <th>Units</th>
                                            <th>SKU</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <tr></tr>
                                            <th><input type="checkbox" id="chkCheckAll"></th>
                                            <th>ID</th>
                                            <th>Type</th>
                                           <th>name</th>
                                           <th>Description</th>
                                           <th>Units</th>
                                           <th>SKU</th>
                                           <th>Date Added</th>
                                           <th>Action</th>
                                        
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($items as $item)
                                         <tr id="sid{{$item->id}}"></tr>
                                           
                                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$item->id}}"></td>
                                           <td> {{$item->id}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->units}}</td>
                                            <td>{{$item->sku}}</td>
                                             <td>{{$item->created_at}}</td>
                                             @can('item-edit')
                                         <td><a href="{{route('item.edit', $item->id)}}"><i class="fa fa-edit text-primary"> </i></td>
                                         @endcan
                                            <td>
                                                @can('item-delete')
                                                <form action="{{url('item/'.$item->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')  
                                                    <button type="submit" onclick="return confirm('Confirm Delete?')"  style="border: none;background:color:transparent;">  
                                                        <i class="fa fa-trash text-danger"></i></button> 
                                                </form>
                                                @endcan
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
   
       url:"{{route('item.delete')}}",
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

























