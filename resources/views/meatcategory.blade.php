@extends('Admin')
@section('Admin')
    <div class="card">


        <div class="card-body" style width="60">

            <table id="example" class="table table-striped">


                <div class="row">
                    <div class="col-lg-4">
                        <thead>


                            <tr style="background-color:coral">
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Carcass First</th>
                                <th>Total Quantity(KG)</th>
                                <th>last updated</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($category  as $i=> $category)
                                <tr>
                                    <td>{{ $i+1}}</td>

                                    <td><b>{{ $category->category }}</td>
                                </b>
                                <td>{{ $category->qty }}.KG</td>
                                    <td>{{ $category->stock }}.KG</td>
                                    <td>{{ $category->updated_at }}</td>


                                    <td></td>

                                </tr>
                            @endforeach
                        </tbody>
                        <script>
                            $(document).ready(function() {
                                $('#example').DataTable();
                            });
                        </script>
                    @endsection
