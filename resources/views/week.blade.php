@extends('Admin')
@section('Admin')

<div class="card">

    <div class="card-body">


    <table id="example"  class="table table-bordered ">
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
            @foreach ($billingswwkly as $i => $sale)

            <td>{{  $i+1 }}</td>


            <td>{{ $sale->namein }}</td>

            {{-- <td>{{ $sale->sales_qty }}</td> --}}

            <td>{{ $sale->qty }}</td>

            {{-- <td>{{ $sale->totalprice }}</td> --}}

            <td>{{ $sale->invoiceprice }}</td>
            <td>{{ $sale->created_at }}</td>

     </tr>
        @endforeach


    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
    @endsection
