@extends('Admin')

@section('Admin')


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.semanticui.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

<div class="card">
    <div class="card-body">


    <table id="example" class="table table-striped">
        <tr style="background-color:coral">
            <th>ID</th>
            <th>Item Name</th>
            <th>Item code</th>
            <th>Quatity In Stock</th>


            <br> <br>


        </tr>
        <tbody>
            <tr>
                @foreach ($lowstock as $i => $lowstock)
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $lowstock->item_name }}</td>
                    <td>{{ $lowstock->item_code }}</td>
                    <td><button type="button" class="btn btn-danger"><span class="badge badge-danger">{{ $lowstock->item_qty }}</span><span class="sr-only">unread messages</span></td></button>

            </tr>
            @endforeach
        </tbody>

    </table>
</div>
</div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

@endsection
