@extends('Admin')
@section('Admin')
<table id="example" class="table ">
    <thead>



        <tr style="background-color: coral">

            <th>ID</th>
            <th>Name</th>
            <th>Qty</th>
            <th>price</th>
            <th>Sales Date</th>

    </thead>
    </tr>

    <tr>
        @foreach ($billingsYear as $i => $sale)

        <td>{{ $i }}</td>

        <td>{{ $sale->namein }}</td>

        {{-- <td>{{ $sale->sales_qty }}</td> --}}

        <td>{{ $sale->qty }}</td>

        {{-- <td>{{ $sale->totalprice }}</td> --}}

        <td>{{ $sale->invoiceprice }}</td>
        <td>{{ $sale->created_at }}</td>




    </tr>
    @endforeach

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>



@endsection
