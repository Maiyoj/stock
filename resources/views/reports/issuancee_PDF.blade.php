   
    

    <style>
        #issuancee {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #issuancee td, #issuancee th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #issuancee tr:nth-child(even){background-color: #f2f2f2;}
        
        #issuancee tr:hover {background-color: #ddd;}
        
        #issuancee th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
          #issuancee{
          width: 100%;
        }
        }
        </style>
    
   
   
   
   <div class="table-responsive">
    <table class="table table-border table-striped custom-table mb-0">
    <table id="issuancee">
         <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Zone</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Purpose</th>
                <th>Date Added</th>
                
            </tr>
        </thead>
        
        <tbody>
            @forelse($issuancees as $issuancee)
            <tr>
                <td>{{$issuancee->id}}</td>
                <td>{{$issuancee->user->name}}</td>
                <td>{{$issuancee->zone->zone}}</td>
                 <td>{{$issuancee->item->name}}</td>
                <td>{{$issuancee->quantity}}</td>
                <td>{{$issuancee->purpose}}</td>
                 <td>{{$issuancee->created_at}}</td>
                 
         </td>
                </tr>                                                           
            @empty
            

            @endforelse
      
            
           
        </tbody>
    </table>