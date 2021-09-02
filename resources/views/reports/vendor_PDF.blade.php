
<style>
    #vendor {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #vendor td, #vendor th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #vendor tr:nth-child(even){background-color: #f2f2f2;}
    
    #vendor tr:hover {background-color: #ddd;}
    
    #vendor th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
      #vendor{
      width: 100%;
    }
    }
    </style>



<div class="table-responsive">
    <table class="table table-border table-striped custom-table mb-0">
    <table id="vendor">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Date Added</th>
                <th>Action</th>
                
            </tr>
        </thead>
        
        <tbody>
            @forelse($vendors as $vendor)
            <tr>
                <td>{{$vendor->id}}</td>
                <td>{{$vendor->name}}</td>
                <td>{{$vendor->created_at}}</td>
                
         </td>
        
            </tr>                                                           
            @empty
          @endforelse
          </tbody>
           </table