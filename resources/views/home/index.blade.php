@extends('front.index')
    

@section('title')
<title>Dashboard</title>
@endsection
@section('content') 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Recent Engineer Request
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Zone</th>
                                            <th>No. of Items</th>
                                            <th>Purpose</th>
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
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                <th>Date Added</th>
                                            </tr>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                          @forelse($stocks as $requestengineer)
                                        <tr>
                                        <td>{{$requestengineer->id}}</td>
                                            <td>{{$requestengineer->user->name}}</td>
                                            <td>{{$requestengineer->zone->zone}}</td>
                                            <td>{{$requestengineer->erequests_item->count()}}</td>
                                            <td>{{$requestengineer->purpose}}</td>
                                            <td class="{{$requestengineer->status=='pending' ? 'text-danger' :'text-success'}}">{{$requestengineer->status}}</td>
                                             <td>{{$requestengineer->created_at}}</td>
                                            <td><a href="{{route('requestengineer.show', $requestengineer->id)}}"><i class="fa fa-eye text-primary"> </i></td>
                                            <td> 
                                           
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