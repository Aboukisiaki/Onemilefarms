@extends('Admin')
@section('Admin')
<link rel="stylesheet" href="    https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css
">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.semanticui.min.css
">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">


<div class="card">
    <div class="card-body">
        <table id="example" class="table table-striped">
        <thead>
            <tr style="background-color: coral">
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>price</th>
                {{-- <th>Total Price</th> --}}
                <th>Sales Date</th>

        </thead>
        </tr>

        <tr>
            @foreach ($billings as $i => $sale)
                <td>{{ $i }}</td>

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
