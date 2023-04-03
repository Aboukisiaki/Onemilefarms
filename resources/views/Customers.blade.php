@extends('Admin')

@section('Admin')

<div class="row">
    <div class="col-sm-4">


<div class="card ">
    <div class="card-body" style="background-color:blanchedalmond">
<div class =container >
    <form method="post" action="Cusin">
@csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Name</label>
                        <input type="patient" name='Customer_name' class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Customer Name">
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone Number</label>
                      <input type="text" name='phone_no' class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone no">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                        <div class="row">
                    <div class = col-sm-6>
                        <label for="exampleInputEmail1">Customer Email</label>
                        <input type="text" name='email' value ="" class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div>

                      <div class = col-sm-6>
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" name='address' class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adress">
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                    </div>

                    <div class="form-group">

                        <label for="exampleInputEmail1" required>Category</label>
                        <select class="form-control" name='rank' id="exampleFormControlSelect1" required>
                        <option value="">---Select---</option>
                        <option value="Beef">Individual</option>
                        <option value="Chicken">Corperate</option>
                        <option value="Pork">Supermarkets</option>
                        </select>

                    </div>
                    <br>


                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
{{--
                    <div class="form-group">
                      <label for="exampleInputPassword1">Rank</label>
                      <input type="text" name='rank' class="form-control" id="exampleInputPassword1" placeholder="Rank">
                    </div> --}}

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



                      {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Received Date</label>
                        <input type="text" readonly name='date' class="form-control" rows= '4'id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="DD-MM-YYY">
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div> --}}











</div></div></div></div>



                <div class="col-sm-8">


<div class="container">
<div class = card>
    <div class = card-body>

<table id="example" class="table table-striped">



    <tr>
                        <th>ID</th>

                        <th>Customer Name</th>
                        <th>Phone No</th>
                        <th>Email</th>
                        <th>Address</th>

                        <th>Rank</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i=1  ?>
                   @foreach ($cus as $i=> $customers)

                    <tr>

                        <td>{{$i+1}}</td>

                         <td>{{$customers->Customer_name}}</td>
                          <td>{{$customers->phone_no}}</td>
                          <td>{{$customers->email}}</td>


                         <td>{{$customers->address}}</td>
                           <td>{{$customers->rank}}</td>

            <td>


                        <a href="{{ url('materials_edit').$customers->id}}" i class="fa fa-eye" style='color:rgb(153, 49, 233)'></a>

                    <a href="{{ url('materials_edit').$customers->id}}" button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                        {{-- Launch --}}
                    </a>

                    </td>
                                        </tr>
                     @endforeach

                     <script>
                        $(document).ready(function() {
                            $('#example').DataTable();
                        });
                    </script>

@endsection
