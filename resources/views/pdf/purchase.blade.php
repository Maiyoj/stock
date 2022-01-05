<div class="col-md-8 mt-4">
    <div class="form-floating mb-3 mb-md-0">
        <input class="form-control" id="inputFirstName" readonly type="text" name="name" value="{{$purchase->id}}" placeholder="Enter your first name" />
        <label for="inputFirstName">Purchase ID</label>
    </div>
</div>
<div class="col-md-8 mt-4">
    <div class="form-floating mb-3 mb-md-0">
        <input class="form-control" id="inputFirstName" readonly type="email" name="email" value="{{$purchase->purchase_items->count()}}"  placeholder="name@example.com"  />
        <label for="inputFirstName">No of Items</label>
    </div>
</div>
<div class="col-md-8 mt-4">
    <div class="form-floating mb-3 mb-md-0">
        <input class="form-control" id="inputFirstName" readonly type="address" value="{{$purchase->PO_number}}" placeholder="Enter your first name" />
        <label for="inputFirstName">PO Number</label>
    </div>
</div>
<div class="col-md-8 mt-4">
    <div class="form-floating mb-3 mb-md-0">
        <input class="form-control" id="inputFirstName" readonly type="address" value="{{$purchase->vendor->name}}" placeholder="Enter your first name" />
        <label for="inputFirstName">Vendor</label>
    </div>
</div>
</div>
</form>
</div> 
<div class="col-md-4">
<h4>Purchase Items</h4>
<table class="table table-striped">
<thead>
<tr>
<th scope="col">#</th>
<th>Item </th>
<th>Quantity</th>
<th>Price</th>
</tr>
</thead>
<tbody>

@foreach ($purchase->purchase_items as $item)
    @foreach ($items as $itm)
        @if ($item->item_id ==$itm->id)
        <tr>
            <th scope="row">{{$itm->id}}</th>
            <td>{{$itm->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$itm->itemprice[0]->price}}</td>
        </tr>
        @endif
    @endforeach
@endforeach
    <tr>
        <th></th>
        <th>Total Price: </th>
        <th></th>
        <th>{{$purchase->price}}</th>
        
    </tr>
</tbody>
</table>