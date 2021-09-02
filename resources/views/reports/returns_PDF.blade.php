

<style>
    #returns {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #returns td, #returns th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #returns tr:nth-child(even){background-color: #f2f2f2;}
    
    #returns tr:hover {background-color: #ddd;}
    
    #returns th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
      #returns{
      width: 100%;
    }
    }
    </style>
<div class="table-responsive">
    <table class="table table-border table-striped custom-table mb-0">
    <table id="returns">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Zone</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Date Added</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
       
        <tbody>
            @forelse($returnss as $returns)
            <tr>
                <td>{{$returns->id}}</td>
                <td>{{$returns->user->name}}</td>
                <td>{{$returns->zone->zone}}</td>
                <td>{{$returns->item->name}}</td>
                <td>{{$returns->quantity}}</td>
                 <td>{{$returns->created_at}}</td>
                
                 </td>
                </tr>                                                           
            @empty
        @endforelse

        </tbody>
    </table>