@extends('Admin')

@section('Admin')
    <div class="row">
        <div class="col-sm-4">


            <div class="card ">
                <div class="card-body" style="background-color:coral">
                    <div class=container>
                        <form method="post" action="Supin">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Supplier Name</label>
                                <input type="patient" name='Supplier_name' class="form-control" rows='4'
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Supplier Name"required>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name='product_name' class="form-control" rows='4'
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name"required>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="row">
                                <div class=col-sm-6>
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name='phone_no' class="form-control" rows='4'
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="+255 .."required>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>

                                <div class=col-sm-6>
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name='email' class="form-control" rows='4'
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"required>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="exampleInputPassword1">Rank</label>
                                <input type="text" name='rank' class="form-control" id="exampleInputPassword1"
                                    placeholder="Rank"required>
                            </div>

                            <br>


                            <button type="submit" class="btn btn-info"
                                style="background-color:skyblue)">Submit</button>
                        </form>







                    </div>
                </div>
            </div>
        </div>



        <div class="col-sm-8">


            <div class="container">
                <div class=card>
                    <div class=card-body>

                        <table id="data-table" class="table table-striped">



                            <tr>
                                <th>ID</th>

                                <th>Suplier Name</th>
                                <th>Product Name</th>
                                <th>Phone no</th>
                                <th>Email</th>t</th>

                                <th>Address</th>
                                <th>Rank</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($supplier as $i => $suppliers)
                                    <tr>

                                        <td>{{ $i }}</td>

                                        <td>{{ $suppliers->Supplier_name }}</td>
                                        <td>{{ $suppliers->product_name }}</td>
                                        <td>{{ $suppliers->phone_no }}</td>


                                        <td>{{ $suppliers->email }}</td>
                                        <td>{{ $suppliers->address }}</td>
                                        <td>{{ $suppliers->rank }}</td>


                                        <td>


                                            <a href="{{ url('materials_edit') . $suppliers->id }}" i class="fa fa-eye"
                                                style='color:rgb(153, 49, 233)'></a>

                                            {{-- <a href="{{ url('materials_edit').$suppliers->id}}" button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view{{ $materials->id }}"> --}}
                                            Launch
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endsection
