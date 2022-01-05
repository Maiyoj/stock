


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