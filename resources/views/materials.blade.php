@extends('Admin')

@section('Admin')
{{-- 
<link rel="stylesheet" href="    https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css
">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.semanticui.min.css
">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"> --}}


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.5.2/css/bootstrap.css
">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap3.min.css
">


    <div class="card">


        <div class="card-body" style width="100%">


            <table id="example"  class="ui celled table" width="100%" >

                <div class="row">
                    <div class="col-lg-12">
                        <thead>


                            <tr style="background-color:coral">
                                <th>ID</th>

                                <th>Product Name</th>
                                <th>Supplier Name</th>
                                <th>Carcass QTY</th>
                                <th>Product Cost</th>
                                <th>Current stock</th>
                                <th>Added stock</th>
                                <th>Out stock</th>
                                <th>Category</th>
                                <th>Received Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($material as $i => $materials)
                                <tr>

                                    <td>{{ $i + 1 }}</td>

                                    <td>{{ $materials->product_name }}</td>
                                    <td>{{ $materials->supplier_name }}</td>
                                    <td>{{ $materials->qty }}. KG</td>
                                    <td>{{ $materials->product_cost }}</td>
                                    <td>{{ $materials->current_stock }}</td>
                                    <td>{{ $materials->added_stock }}</td>
                                    <td>{{ $materials->out_stocked }}</td>
                                    <td>{{ $materials->category }}</td>
                                    <td>{{ $materials->date }}</td>

                                    <td>


                                        {{-- <a href="{{ url('materials_edit').$materials->id}}" i class="fa fa-eye" style='color:rgb(153, 49, 233)'></a> --}}

                                        <a href="{{ url('materials_edit') . $materials->id }}" title="add stock" button
                                            type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#view{{ $materials->id }}" style="background-color:blue">
                                            <i class="fa fa-add"></i>
                                        </a>
                                        <a href="{{ url('materials_edit') . $materials->id }}" title="remove stock" button
                                            type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#view2{{ $materials->id }}"  style="background-color:coral">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="{{ url('stock_history') . $materials->id }}" title="stock history" button
                                            type="button" class="btn btn-info">
                                            <i class="fa fa-info"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach





                            @foreach ($material as $materials)
                                <!-- Modal -->
                                <div class="modal fade" id="view{{ $materials->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Materials (Add)</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class=container>

                                                    <form method="post" action="{{ url('materials2' . $materials->id) }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Product Name</label>
                                                            <input type="patient" disabled name='product_name'
                                                                value="{{ $materials->product_name }}" class="form-control"
                                                                rows='4' id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Enter Product Name">
                                                            <small id="emailHelp" class="form-text text-muted"></small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Supplier Name</label>
                                                            <input type="text" disabled
                                                                name='supplier_name'value="{{ $materials->supplier_name }}"
                                                                class="form-control" rows='4' id="exampleInputEmail1"
                                                                aria-describedby="emailHelp" placeholder="Supplier">
                                                            <small id="emailHelp" class="form-text text-muted"></small>
                                                        </div>
                                                        <div class="row">
                                                            <div class=col-sm-3>
                                                                <label for="exampleInputEmail1">Product QTY</label>
                                                                <input type="text" disabled name='qty'
                                                                    value="{{ $materials->qty }}" class="form-control"
                                                                    rows='4' id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" placeholder="KG">
                                                                <small id="emailHelp" class="form-text text-muted"></small>
                                                            </div>

                                                            <div class=col-sm-3>
                                                                <label for="exampleInputEmail1">Add Stock</label>
                                                                <input type="number" name='added_stock' value="1"
                                                                    min="1" class="form-control" rows='4'
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                    placeholder="KG">
                                                                <small id="emailHelp" class="form-text text-muted"></small>
                                                            </div>
                                                            <div class=col-sm-3>
                                                                <label for="exampleInputEmail1">Out Stock</label>
                                                                <input type="text" readonly name='out_stocked' disabled
                                                                    value="{{ $materials->out_stocked }}" min="1"
                                                                    class="form-control" rows='4' id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" placeholder="KG">
                                                                <small id="emailHelp" class="form-text text-muted"></small>
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Product Cost</label>
                                                            <input type="text" name='product_cost'
                                                                value="{{ $materials->product_cost }}"
                                                                class="form-control" id="exampleInputPassword1"
                                                                placeholder="TZS">
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
                                                            <input type="text" readonly name='date'
                                                                value="{{ $materials->date }}" class="form-control"
                                                                rows='4' id="exampleInputEmail1"
                                                                aria-describedby="emailHelp" placeholder="DD-MM-YYY">
                                                            <small id="emailHelp" class="form-text text-muted"></small>
                                                        </div>



                                                        <br>


                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>





                                                </div>



                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            @foreach ($material as $materials)
                                <!-- Modal -->
                                <div class="modal fade" id="view2{{ $materials->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Materials (Out)</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class=container>
                                                    <form method="post" action="{{ url('materials3' . $materials->id) }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Product Name</label>
                                                            <input type="patient" name='product_name'
                                                                value="{{ $materials->product_name }}"
                                                                class="form-control" rows='4' id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Enter Product Name">
                                                            <small id="emailHelp" class="form-text text-muted"></small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Supplier Name</label>
                                                            <input type="text"
                                                                name='supplier_name'value="{{ $materials->supplier_name }}"
                                                                class="form-control" rows='4' id="exampleInputEmail1"
                                                                aria-describedby="emailHelp" placeholder="Supplier">
                                                            <small id="emailHelp" class="form-text text-muted"></small>
                                                        </div>
                                                        <div class="row">
                                                            <div class=col-sm-3>
                                                                <label for="exampleInputEmail1">Product QTY</label>
                                                                <input type="text" name='qty'
                                                                    value="{{ $materials->qty }}" class="form-control"
                                                                    rows='4' id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" placeholder="KG">
                                                                <small id="emailHelp"
                                                                    class="form-text text-muted"></small>
                                                            </div>

                                                            <div class=col-sm-3>
                                                                <label for="exampleInputEmail1">Add Stock</label>
                                                                <input type="number" readonly name='added_stock'
                                                                    value="{{ $materials->added_stock }}" min="1"
                                                                    class="form-control" rows='4' id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" placeholder="KG">
                                                                <small id="emailHelp"
                                                                    class="form-text text-muted"></small>
                                                            </div>
                                                            <div class=col-sm-3>
                                                                <label for="exampleInputEmail1">Out Stock</label>
                                                                <input type="number" min="1" value="1"
                                                                    name='out_stocked' class="form-control" rows='4'
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                    placeholder="KG">
                                                                <small id="emailHelp"
                                                                    class="form-text text-muted"></small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Product Cost</label>
                                                            <input type="text" name='product_cost'
                                                                value="{{ $materials->product_cost }}"
                                                                class="form-control" id="exampleInputPassword1"
                                                                placeholder="TZS">
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
                                                            <input type="text" readonly name='date'
                                                                value="{{ $materials->date }}" class="form-control"
                                                                rows='4' id="exampleInputEmail1"
                                                                aria-describedby="emailHelp" placeholder="DD-MM-YYY">
                                                            <small id="emailHelp" class="form-text text-muted"></small>
                                                        </div>



                                                        <br>


                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>





                                                </div>



                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach




                         

                            <script>
                                
                                $(document).ready(function () {
    $('#example').DataTable();
});
                            </script>
                        @endsection
