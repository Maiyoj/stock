
<style>
    #issuance {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #issuance td, #issuance th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #issuance tr:nth-child(even){background-color: #f2f2f2;}
    
    #issuance tr:hover {background-color: #ddd;}
    
    #issuance th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
      #issuance{
      width: 100%;
    }
    }
    </style>






<div class="table-responsive">
    <table class="table table-border table-striped custom-table mb-0">
         <table id="issuance">
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
            @forelse($issuances as $issuance)
            <tr>
                <td>{{$issuance->id}}</td>
                <td>{{$issuance->user->name}}</td>
                <td>{{$issuance->zone->zone}}</td>
                <td>{{$issuance->item->name}}</td>
                <td>{{$issuance->quantity}}</td>
                 <td>{{$issuance->created_at}}</td>
                
            
         </td>
                </tr>                                                           
            @empty
            

            @endforelse
      
            
           
        </tbody>
    </table>