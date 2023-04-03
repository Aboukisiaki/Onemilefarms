@extends('Admin')
@section('Admin')



 <form method="post" action={{ url("stock_after/".$items->id)}}>
    @csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" value="{{ $items->item_name }}"  name='item_name' class="form-control" id="exampleFormControlInput1" placeholder="item name">
  </div>

  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Quantity</label>
    <input type="number" value="{{ $items->item_qty }}" name='item_qty' class="form-control" id="exampleFormControlInput1" placeholder="Quantity">
  </div>

  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Price</label>
    <input type="text" value="{{ $items->sale_price }}"  name="sale_price"  class="form-control" id="exampleFormControlInput1" placeholder="Price">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Item Code</label>
    <input type="text" value="{{ $items->item_code }}"  name="sale_price"  class="form-control" id="exampleFormControlInput1" placeholder="BarCode">
  </div>
  <button type="submit"  class="btn btn-primary" class="fa fa-align-center" aria-hidden="true">Update</button>

</form>


@endsection

