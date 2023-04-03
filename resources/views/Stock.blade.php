@extends('Admin')

@section('Admin')
    <center>        <div class="container">
            <div class="card"style="background-color::rgb(11, 179, 245)">
                <div class="card-body">
                   {{-- <marquee><h4 style="background-color:rgb(11, 179, 245)">Add Incoming Carcass</h4></marquee> --}}


                </div>
            </div>
            </div>
            <br>
        <div class="jumbotron">
            {{-- <div class="card" style="background-color:"> --}}
                {{-- <div class="card-body" style="background-color"> --}}
                    <div class=container style=width:50%>
                        <form method="post" action="materials_in">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="patient" name='product_name' class="form-control" rows='4' id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Product Name">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Supplier Name</label>
                                <input type="text" name='supplier_name' class="form-control" rows='4'
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Supplier">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="row">
                                <div class=col-sm-12>
                                    <label for="exampleInputEmail1">Product QTY</label>
                                    <input type="text" name='qty' value="" class="form-control" rows='4'
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="KG">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Cost</label>
                                    <input type="text" name='product_cost' class="form-control"
                                        id="exampleInputPassword1" placeholder="TZS">
                                </div>

                                <div class=col-sm-6>
                                    <label for="exampleInputEmail1">Category</label>



                                    <select class="form-control" name ='category' id="exampleFormControlSelect1">
                                        <option value="">---Select---</option>
                                        @foreach ( $category as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>



                            {{-- date --}}

                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Received Date</label>
                                <input type="text" readonly name='date' class="form-control" rows='4'
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="DD-MM-YYY">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div> --}}



                            <br>


                            <button type="submit" class="btn btn-warning">Submit</button>
                        </form>





                    </div>


    <div class="col-md-7">
    @endsection
