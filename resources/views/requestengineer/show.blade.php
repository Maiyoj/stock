@extends('front.index')

@section('title')
<title>Show Request Details </title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Show Request Details </li>
                        </ol>
                        <div class="p-2 bd-highlight"><a class="btn btn-primary text-white" href="{{ route('report.show',$requestengineer->id) }}">Report</a></div>
                        <div class="p-2 bd-highlight"><a class="btn btn-success text-white" href="{{ route('pdf.engineer',$requestengineer->id) }}">Export PDF</a></div>
                        <div class="card mb-12">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Request Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="" method="post">  
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
                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{session('success')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="text" name="name" value="{{$requestengineer->id}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Request ID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="email" name="email" value="{{$requestengineer->erequests_item->count()}}"  placeholder="name@example.com"  />
                                                        <label for="inputFirstName">No of Items</label>
                                                    </div>
                                                </div>



                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="address" value="{{$requestengineer->purpose}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Purpose</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="address" value="{{$requestengineer->zone->zone}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Zone</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" readonly type="address" value="{{$requestengineer->user->name}}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Engineer Name</label>
                                                    </div>
                                                </div>
                                            </div>


                                        
                                        </form>
                                    </div> 
                                    <div class="col-md-4">
                                        <h4>Request Items</h4>
                                        <table id="datatablesSimple">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th>Item </th>
                                                <th>Allocated Quantity</th>
                                                <th>Used Quantity</th>
                                                <th>Remaining Quantity</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                
                                                @foreach ($requestengineer->erequests_item as $item)
                                                @php
                                                    $used = 0;
            
                                                    $check = $report->where('item_id',$item->item_id)->first();
                                                    if($check)
                                                    {
                                                        $used = $report->where('item_id',$item->item_id)->sum('allocated_quantity');
                                                    }
                                                @endphp
                                                    @foreach ($items as $itm)
                                                        @if ($item->item_id ==$itm->id)
                                                        <tr>
                                                            <th scope="row">{{$itm->id}}</th>
                                                            <td>{{$itm->name}}</td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td>{{$used==0 ? '0':$used}}</td>
                                                            <td>{{$item->quantity-$used}}</td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-6">
                                        <h4>Comments</h4>
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                            <th>Comments</th>
                                            </tr>
                                        </thead>
                                       
                                    @forelse($comment as $comment)
                                </tr>  
                                <td>{{$comment->comment}}</td>
                                
                            </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                              <div class="col-md-4">
                                        <h4>Site Details</h4>
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>Site Name</th>
                                            <th> Client Name</th>
                                            </tr>
                                        </thead>
                                       
                                    @forelse($report as $report)
                                </tr>  
                                <td>{{$report->site_name}}</td>
                                <td>{{$report->client_name}}</td>
                                
                            </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
@endsection  