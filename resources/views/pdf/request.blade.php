<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Purchases</title>
     
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
                    <th>Zone</th> 
                </tr>
            </thead>
            <tbody>
     
                <tr>
                    <td>{{$request->id}}</td>
                    <td>{{$request->request_item->count()}}</td>
                    <td>{{$request->zone->zone}}</td>
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
                    <th style="width:25%">Price</th>
                    <th style="width:25%">Quantity</th> 
                </tr>
            </thead>
            <tbody>
                @php
                    $id = 1;
                @endphp
                @foreach ($request->request_item as $item)
                    @foreach ($items as $itm)
                        @if ($item->item_id ==$itm->id)
                        <tr>
                            <td>{{$id}}</td>
                            <td>{{$itm->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$itm->itemprice[0]->price}}</td>
                        </tr>
                        @php
                            $id++;
                        @endphp
                        @endif
                       
                    @endforeach
                @endforeach
                  
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>