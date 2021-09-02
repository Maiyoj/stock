


<style>
    #zone {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #zone td, #zone th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #zone tr:nth-child(even){background-color: #f2f2f2;}
    
    #zone tr:hover {background-color: #ddd;}
    
    #zone th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
      #zone{
      width: 100%;
    }
    }
    </style>


<div class="table-responsive">
    <table class="table table-border table-striped custom-table mb-0">
    <table id="zone">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Zone</th>
                <th>Date Added</th>
                <th>Action</th>
                
            </tr>
        </thead>
       
        <tbody>
            @forelse($zones as $zone)
            <tr>
                <td>{{$zone->id}}</td>
                <td>{{$zone->user->name}}</td>
                <td>{{$zone->zone}}</td>
                 <td>{{$zone->created_at}}</td>
                 >
         </td>
                </tr>                                                           
            @empty
            

            @endforelse
      
            
           
        </tbody>
    </table>