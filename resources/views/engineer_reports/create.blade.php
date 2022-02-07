@extends('front.index')

@section('title')
<title>Add Report</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Add Report
                            </div>
                            <div class="card-body">
                                        <form action="{{route('session.add',$requestengineer->id)}}" method="post" enctype="multipart/form-data">  
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            @if ($errors->any())
                                                                @foreach($errors->all() as $error)
                                                                    <div class="alert alert-danger">
                                                                        {{$error}}
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <div class="col-md-12  mt-4">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" id="inputFirstName" type="text" name="site_name" value="{{Session::has('report_items') ? Session::get('report_items')[0]['site_name'] : null}} " placeholder="Enter site name" />
                                                                <label for="inputFirstName">Site Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12  mt-4">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" id="inputName" type="text" name="client_name" value="{{Session::has('report_items') ? Session::get('report_items')[0]['client_name'] : null}}" placeholder="Enter client name" />
                                                                <label for="inputFirstName">Client Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <select id="" name="item_id" class="form-control"> 
                                                                    @foreach ($requestengineer->erequests_item  as $item)
                                                                        <option value="{{$item->items->id}}">{{$item->items->name}}</option>
                                                                    @endforeach
                                                                </select>

                                                            <label for="inputFirstName">Item</label>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="request_id" value="{{$requestengineer->id}}">
                                                        <div class="col-md-12 mt-4" >
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" id="inputFirstName" type="number" name="quantity" placeholder="Enter allocated quantity" />
                                                                <label for="inputFirstName">Used Quantity</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" id="inputFirstName" type="file" name="document" placeholder="Attach document" />
                                                                <label for="inputFirstName">Document</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <div class="d-grid gap-2 col-4 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-6"><button type="submit" class="btn btn-primary ">Add Item</button></div>
                                                                    <div class="col-md-6"> <button class="btn btn-danger " formaction="{{route('report.store',$requestengineer->id)}}">Create</button></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                        <div class="col-md-6">
                                            <h4>Items</h4>
                                            @if (Session::has('report_items'))
                                            <table id="datatablesSimple">
                                                <thead>
                                                  <tr>
                                                 
                                                    <th>Item </th>
                                                    <th>Site Name</th>
                                                    <th>Client Name</th>
                                                    <th>Used Quantity</th>
                                                  
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (Session::get('report_items') as $id => $item)
                                                        @foreach ($items as $itm)
                                                            @if ($item['item_id'] ==$itm->id)  
                                                            <tr>
                                                         
                                                                <td>{{$itm->name}}</td>
                                                                <td>{{$item['site_name']}}</td>
                                                                <td>{{$item['client_name']}}</td>
                                                                <td>{{$item['allocated_quantity']}}</td>
                                                               
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                         
                                            @else
                                                Please Add Items
                                            @endif
                                            <div class="d-flex flex-row-reverse bd-highlight">
                                                <div class="p-2 bd-highlight"> <a class="btn btn-primary" href="/admin">Cancel</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </main>
@endsection  