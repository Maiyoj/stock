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
            <h2>Purchases Table</h2>
         <table id="datatablesSimple" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>No of Items</th>
                    <th>Vendor</th>
                    <th>PO Number</th>
                    <th>Price</th>
                    <th>Date Added</th> 
                </tr>
            </thead>
            <tbody>
                @forelse($purchases as $purchase)
                <tr>
                    <td>{{$purchase->id}}</td>
                    <td>{{$purchase->purchase_items->count()}}</td>
                    <td>{{$purchase->vendor->name}}</td>
                    <td>{{$purchase->PO_number}}</td>
                    <td>{{$purchase->price}}</td>
                    <td>{{$purchase->created_at}}</td>
                </tr>                                                           
                @empty
                

                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>