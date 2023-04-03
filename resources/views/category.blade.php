@extends('Admin')
@section('Admin')

<link rel="stylesheet" href="    https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css
">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.semanticui.min.css
">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">





    <div class="row">
        <div class="col-sm-4">


            <div class="card ">
                <div class="card-body" style="background-color:blanchedalmond">
                    <div class=container>
                        <form method="post" action="category_in">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="patient" name='name' class="form-control" rows='4'
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>





                            {{-- <div class="form-group">

                                <label for="exampleInputEmail1" required>Category</label>
                                <select class="form-control" name='rank' id="exampleFormControlSelect1" required>
                                    <option value="">---Select---</option>
                                    <option value="Beef">Individual</option>
                                    <option value="Chicken">Corperate</option>
                                    <option value="Pork">Supermarkets</option>
                                </select>

                            </div>]
                            {{-- <br> --}}
                            <br>

                            <button type="submit" class="btn btn-warning">Submit</button>



                    </div>
                </div>
            </div>
        </div>



        <div class="col-sm-8">


            <div class="container">
                <div class=card>
                    <div class=card-body>

                        <table id="example" class="table table-striped">



                            <tr>
                                <th>ID</th>

                                <th>Customer Name</th>
                                 <th>Registered Date</th>
                                 <th>Action</th>


                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($category as $i => $category)
                                    <tr>

                                        <td>{{ $i + 1 }}</td>

                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at }}</td>





                                        <td>


                                            <a button href="{{ url('destroy') . $category->id }}" class="btn btn-danger" style='color:orange' title='remove X'><i class="fa fa-times"
                                                style='color:rgb(11, 1, 18)'></a></i>

                                            {{-- <a href="{{ url('destroy') . $category->id }}" button type="button"
                                                class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                                {{-- Launch --}}
                                            {{-- </a> --}}

                                        </td>
                                    </tr>
                                @endforeach






                                {{-- <script src="{{ asset('backend2/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>


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

 <script src="{{ asset('backend2/plugins/jQuery/jquery-2.2.3.min.js') }}"></script> --}}



    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

@endsection



