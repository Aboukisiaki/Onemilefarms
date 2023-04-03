@extends('Admin')

@section('Admin')

<table id="data-table" class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Item code</th>
            <th>Quatity In Stock</th>
            <th>Price </th>
            <th>Action </th>
            <br> <br>


        </tr>
    </thead>
        <tbody>
            <tr>
                @foreach ($items as $i=> $item )

                <td>{{$i+1 }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->item_code }}</td>
                <td>{{ $item->item_qty }}</td>
                <td>{{ $item->sale_price }}</td>
                <td><a href="{{url('updatestock/'.$item->id)}}" title="update" i class="btn btn-info">
                    <i class="fa fa-info"></i>
                </a>

                </td>
            </tr>
        </tbody>
            @endforeach


            <script src="{{ asset('backend2/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>


            <script>

    $('#data-table').DataTable({
    "order": [[0, "asc"]],
    "columnDefs": [
    {"orderable": false, "targets": [3]}
    ],
    "language": {
    "lengthMenu": "{{ trans('Materials') }}",
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


        @endsection
