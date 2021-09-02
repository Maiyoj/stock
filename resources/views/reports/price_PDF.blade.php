

<style>
    #price {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #price td, #price th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #price tr:nth-child(even){background-color: #f2f2f2;}
    
    #price tr:hover {background-color: #ddd;}
    
    #price th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
      #price{
      width: 100%;
    }
    }
    </style>




<div class="table-responsive">
    <table class="table table-border table-striped custom-table mb-0">
    <table id="price">
        
        <thead>
            <tr>
                <th>ID</th>
                <th>Vendor</th>
                <th>Item</th>
                <th>Price</th>
                <th>Date Added</th>

                
            </tr>
        </thead>
       
        <tbody>
            @forelse($prices as $price)
            <tr>
                <td>{{$price->id}}</td>
                <td>{{$price->item->name}}</td>
                <td>{{$price->vendor->name}}</td>
                <td>{{$price->price}}</td>
                 <td>{{$price->created_at}}</td>
                
         </td>
          </tr>                                                           
            @empty
            

            @endforelse
      
            
           
        </tbody>
    </table>