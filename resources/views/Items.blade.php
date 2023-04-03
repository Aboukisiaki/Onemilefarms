@extends('Admin')

@section('Admin')
    {{-- <div class="row">
    <div class="col-sm-4"> --}}


    <div class=container style=width:60%>

        <div class="card ">
            <div class="card-body" style="background-color:blanchedalmond">


                <form method="post" action="items2" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Name</label>
                        <input type="text" name='item_name' class="form-control" rows='4' id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Product Name" required>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Item code</label>
                        <input type="text" name='item_code' class="form-control" rows='4' id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="BarCode">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="row">
                        <div class=col-sm-6>
                            <label for="exampleInputEmail1">QTY(kg/mgr)</label>
                            <input type="text" name='kg_mgr' class="form-control" rows='4' id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="KG">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>

                        <div class=col-sm-6>
                            <label for="exampleInputEmail1" required> Image</label>
                            <input type="file" name='image' class="form-control" rows='4' id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="image" required="required">
                            <small id="emailHelp" class="form-text text-muted"></small>
                            @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Item Total in stock</label>
                        <input type="number" min="1" name='item_qty' class="form-control"
                            id="exampleInputPassword1" placeholder="KG">
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Cost</label>
                        <input type="text" name='product_cost' class="form-control" id="exampleInputPassword1"
                            placeholder="TZS">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Sale Price</label>
                        <input type="text" name='sale_price' class="form-control" rows='4' id="exampleInputEmail1"
                            placeholder="Tzs" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">

                        <label for="exampleInputEmail1" required>Category</label>
                        <select class="form-control" name='category' id="exampleFormControlSelect1" required>
                        <option value="">---Select---</option>
                        @foreach ($cate as $category )


                        <option value="{{  $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>
<br>
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Profit</label>
                        <input type="text" name='profit' class="form-control" rows='4' id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Profit">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div> --}}
{{--
                    <div class="form-group">
                        <label for="exampleInputEmail1">Received Date</label>
                        <input type="text" readonly name='date' class="form-control" rows='4' id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="DD-MM-YYY">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div> --}}

                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>





            </div>
        </div>
    </div>

    </div>






    {{-- <div class="col-md-7">

                    <table id="data-table" class="table ">
                        <thead>


                        <tr>
                                            <th>ID</th>
                                            <th>Item Name</th>
                                            <th>Item code</th>
                                            <th>Item QTY</th>
                                            <th>Product QTY</th>
                                            <th>Price </th>
                                            <th>Item Total in stock</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody> --}}
    {{-- @foreach ($vars as $i => $vars)

                                        <tr>

                                             {{-- <td>{{$i}}</td>
                                             <td>{{$vars->name}}</td>
                                            <td>{{$vars->email}}</td>
                                            <td>{{$vars->title}}</td>
                                            <td>{{$vars->phone_no}}</td>
                                            <td>{{$User->created_at}}</td>
                                            <td>{{$vars->updated_at}}</td>
                    <td> --}}


    {{-- <a href="{{ url('useredit').$vars->id}}" i class="fa fa-eye" style='color:rgb(153, 49, 233)'></a>
                       <a href="{{ url('users').$vars->id}}" i class="fa fa-trash"style='color:red'></a> --}}


    </td>
    {{-- @endforeach  --}}
    </table>
    </div>
@endsection


 {{-- <script src="{{ assets('backend2/plugins/jQuery/jquery-2.2.3.min.js') }}"></script> --}}


<script>
    $('#data-table').DataTable({
        "order": [
            [0, "asc"]
        ],
        "columnDefs": [{
            "orderable": false,
            "targets": [3]
        }],
        "language": {
            "lengthMenu": "{{ trans('Menu') }}",
            "zeroRecords": "{{ trans('general.zeroRecords') }}",
            "info": "{{ trans('general.info') }}",
            "infoEmpty": "{{ trans('general.infoEmpty') }}",
            "search": "{{ trans('search') }}",
            "infoFiltered": "{{ trans('general.infoFiltered') }}",
            "paginate": {
                "first": "{{ trans('.first') }}",
                "last": "{{ trans('last') }}",
                "next": "{{ trans('next') }}",
                "previous": "{{ trans('previous') }}"

            }
        },
        responsive: false
    });
</script>
