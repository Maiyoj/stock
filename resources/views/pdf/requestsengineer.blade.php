<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Requests</title>
     
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
            <h2>Requests Engineer Table</h2>
         <table id="datatablesSimple" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Zone</th>
                    <th>No. of Items</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requestsengineer as $requestengineer)
                <tr>
                    <td>{{$requestengineer->id}}</td>
                    <td>{{$requestengineer->user->name}}</td>
                    <td>{{$requestengineer->zone->zone}}</td>
                    <td>{{$requestengineer->erequests_item->count()}}</td>
                    <td>{{$requestengineer->purpose}}</td>
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