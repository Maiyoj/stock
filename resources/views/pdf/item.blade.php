
<style>
    #item {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #item td, #item th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #item tr:nth-child(even){background-color: #f2f2f2;}
    
    #item tr:hover {background-color: #ddd;}
    
    #item th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
      #item{
      width: 100%;
    }
    }
    </style>




<div class="table-responsive">
    <table class="table table-border table-striped custom-table mb-0">
    <table id="item">
        <thead>
            <tr>
                <!-- <th>ID</th>-->
                <th>ID</th>
                                             <th>Type</th>
                                            <th>name</th>
                                            <th>Description</th>
                                            <th>Units</th>
                                            <th>SKU</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                          </tr>
                                         </thead>
                                      <tbody>
                                    @forelse($item as $item)
                                      <tr>
                                    <td> {{$item->id}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->units}}</td>
                                            <td>{{$item->sku}}</td>
                                             <td>{{$item->created_at}}</td>
                </tr>                                                           
            @empty
        @endforelse   
        </tbody>
    </table>