<style>
    #purchases {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #purchases td, #purchases th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #purchases tr:nth-child(even){background-color: #f2f2f2;}
    
    #purchases tr:hover {background-color: #ddd;}
    
    #purchases th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
      #purchases{
      width: 100%;
    }
    }
    </style>
    <div class="table-responsive">
        <table class="table table-border table-striped custom-table mb-0">
    <table id="purchases">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Vendor</th>
                <th>PO Number</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date Added</th>
    
                
            </tr>
        </thead>
        
        <tbody>
          @forelse($purchase as $purchase)
          <tr>
              <td>{{$purchase->id}}</td>
              <td>{{$purchase->purchase_items->count()}}</td>
              <td>{{$purchase->vendor->name}}</td>
              <td>{{$purchase->PO_number}}</td>
              <td>{{$purchase->price}}</td>
               <td>{{$purchase->created_at}}</td>
               
         </td>
        
                </tr>                                                           
            @empty
            
            @endforelse
        
        </tbody>
    </table>