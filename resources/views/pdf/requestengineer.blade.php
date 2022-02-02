<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>RequestEngineer</title>
     
        <style>
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }
            
            td, th {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
            }
            
            tr:nth-child(even) {
              background-color: #dddddd;
            }
        </style>
    </head>
<body>
    <div id="layoutSidenav_content">
        <main>
            <h2>Request Details</h2>
         <table id="datatablesSimple" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>No of Items</th>
                    <th>Purpose</th>
                    <th>Zone</th> 
                    <th>Engineer</th> 
                </tr>
            </thead>
            <tbody>
     
                <tr>
                    <td>{{$requestengineer->id}}</td>
                    <td>{{$requestengineer->erequests_item->count()}}</td>
                    <td>{{$requestengineer->purpose}}</td>
                    <td>{{$requestengineer->zone->zone}}</td>
                    <td>{{$requestengineer->user->name}}</td>
                </tr>                                                           
            </tbody>
        </table>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <h2>Requests Items</h2>
         <table id="datatablesSimple" class="table">
            <thead>
                <tr>
                    <th style="width:25%">#</th>
                    <th style="width:25%">Item Name</th>
                    {{-- <th style="width:25%">Price</th> --}}
                    <th style="width:25%">Quantity</th>
                    <th style="width:25%">Used Quantity</th>
                    <th style="width:25%">Remaining Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requestengineer->erequests_item as $item)
                @php
                    $id = 1;
                @endphp

                @php 
                 $used = 0;
                 $check = $report->where('item_id',$item->item_id)->first();
                if($check)
               {
              $used = $report->where('item_id',$item->item_id)->sum('allocated_quantity');
                }
                 @endphp
                @foreach ($requestengineer->erequests_item as $item)
                    @foreach ($items as $itm)
                        @if ($item->item_id ==$itm->id)
                        <tr>
                            <td>{{$id}}</td>
                            <td>{{$itm->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$used==0 ? '0':$used}}</td>
                            <td>{{$item->quantity-$used}}</td>
                        
                        </tr>
                        @php
                            $id++;
                        @endphp
                        @endif
                       @endforeach
                    @endforeach
                @endforeach
                  
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>