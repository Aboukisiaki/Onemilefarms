@extends('Admin')

@section('Admin')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.semanticui.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

<div class="card">
    <div class="card-body">


    <table id="example" class="table table-DataTable ">
        <thead>



            <tr style="background-color:coral">
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>price</th>
                <th>Sales Date</th>

        </thead>
        </tr>

        <tr>
            @foreach ($sales as $i => $sale)
                 <td>{{  $i+1 }}</td>
                <td>{{ $sale->name }}</td>

                <td>{{ $sale->quantity }}</td>

                <td>{{ $sale->price }}</td>

                <td>{{ $sale->today }}</td>





        </tr>
    </div>
</div>
        @endforeach



      <script> 
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    @endsection
