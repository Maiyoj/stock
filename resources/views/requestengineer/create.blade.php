@extends('front.index')

@section('title')
<title>Request</title>
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
                        Request
                            </div>
                            <div class="card-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-8">
                                        <form id="add-item" action="{{route('e_request.add')}}" method="post">  
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    @if ($errors->any())
                                                        @foreach($errors->all() as $error)
                                                            <div class="alert alert-danger">
                                                                {{$error}}
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="col-md-12 mt-4" style="display: {{Session::has('e_request') ? 'none' : ''}}">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="user_id" id="" class="form-control"> 
                                                            @if (Session::has('request'))
                                                                <option value="{{Session::get('e_request')[0]['user_id'] }}" selected></option>
                                                            @endif
                                                            @foreach ($users as $user)
                                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="inputFirstName">User</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4" style="display: {{Session::has('e_request') ? 'none' : ''}}">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="zone_id" id="" class="form-control"> 
                                                            @if (Session::has('request'))
                                                                <option value="{{  Session::get('e_request')[0]['zone_id'] }}" selected></option>
                                                            @endif
                                                            @foreach ($zones as $zone)
                                                                <option value="{{$zone->id}}">{{$zone->zone}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="inputFirstName">Zone</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="item_id" id="" class="form-control"> 
                                                            @foreach ($items as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                    
                                                        <label for="inputFirstName">Item</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" value="" id="inputFirstName" type="text" name="quantity" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Quantity</label>
                                                    </div>
                                                </div>      


                                                <div class="col-md-12 mt-4" style="display: {{Session::has('e_request') ? 'none' : ''}}">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="purpose" id="" class="form-control"> 
                                                            @if (Session::has('request'))
                                                                <option value="{{  Session::get('e_request')[0]['purpose'] }}" selected></option>
                                                            @endif
                                                            <option value="Deployment">Deployment</option>
                                                            <option value="Support">Support</option>
                                                            <option value="Survey">Survey</option>
                                                              
                                                        </select>
                                                        <label for="inputFirstName">Purpose</label>
                                                    </div>
                                                </div>

                                                <div class=" col-md-6 mt-4 mb-0">
                                                <div class="d-grid"><button form="add-item" class="btn btn-info text-white" type="submit">Add Item</button></div>
                                                </div>
                                                <div class=" col-md-6 mt-4 mb-0">
                                                    <div class="d-grid"><a href="{{route('e_request.complete')}}" class="btn btn-primary">Complete Request</a></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>Items</h4>
                                        @if (Session::has('e_request'))
                                        <table class="table table-striped">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th>Item </th>
                                                <th>Quantity</th>
                                                <th>Remove</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <?php $totalprice=0; ?>
                                                @foreach (Session::get('e_request') as $id => $item)
                                                    @foreach ($items as $itm)
                                                        @if ($item['item_id'] ==$itm->id)
                                                        <tr>
                                                            <th scope="row">{{$itm->id}}</th>
                                                            <td>{{$itm->name}}</td>
                                                            <td>{{$item['quantity']}}</td>
                                                            <td><a href="{{route('e_request.remove',$itm->id)}}"><i class="fa fa-trash text-danger"></i></a></td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                            No items added
                                        @endif
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            <div class="p-2 bd-highlight"> <a class="btn btn-primary" href="/admin">Cancel</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection  