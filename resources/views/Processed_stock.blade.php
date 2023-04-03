@extends('Admin')

@section('Admin')

 <div class= "jumbotron">
<div class="card ">
    <div class="card-body" style="background-color:blanchedalmond">
<div class =container >
    <form method="post" action="Proccessed_stock2">
@csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="patient" name='product_name' class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name">
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Supplier Name</label>
                      <input type="text" name='supplier_name' class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Supplier">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                        <div class="row">
                    <div class = col-sm-6>
                        <label for="exampleInputEmail1">Product QTY</label>
                        <input type="text" name='qty' value ="KG" class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="KG">
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div>

                      <div class = col-sm-6>
                        <label for="exampleInputEmail1">Carcass QTY</label>
                        <input type="text" name='carcass_qty' class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="KG">
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                    </div>



                    <div class="form-group">
                      <label for="exampleInputPassword1">Product Cost</label>
                      <input type="text" name='product_cost' class="form-control" id="exampleInputPassword1" placeholder="TZS">
                    </div>

                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Sale Price</label>
                        <input type="text" name='day' class="form-control" rows= '4'id="exampleInputEmail1" placeholder="Tzs" aria-describedby="emailHelp" readonly p>
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" name='Category' class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category">
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div> --}}



                      <div class="form-group">
                        <label for="exampleInputEmail1">Received Date</label>
                        <input type="text" readonly name='date' class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="DD-MM-YYY">
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div>



<br>


                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>





                </div>




                <div class="col-md-7">

@endsection
