@extends('Admin')
@section('Admin')

{{-- <html>
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body> --}}


<div class="container mt-5">
    <div class="card">
        <div class="card-body">
    <h2 class="mb-4">Settings</h2>
    <table class="table table-bordered "id="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>email</th>
                <th>title</th>
                <th>phone_no</th>
            </tr>
        </thead>
        @foreach ($data as $i => $User)
        <tbody>
            <tr>




                    <td>{{ $i+1 }}</td>
                    <td>{{ $User->name }}</td>
                    <td>{{ $User->email }}</td>
                    <td>{{ $User->title }}</td>
                    <td>{{ $User->phone_no }}</td>
                    {{-- <td>{{ $User->created_at }}</td>
                    <td>{{ $User->updated_at }}</td>
                    <td> --}}
            </tr>
            @endforeach
        </tbody>

    </table>
</div></div>
</div>
{{--
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {

    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('settings') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'email', name: 'email'},
            {data: 'age', name: 'age'},
            {data: 'salary', name: 'salary'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });

  });
</script>
 --}}


@endsection
@section('footer-scripts')

    <script>

        $('#data-table').DataTable({
            "order": [[2, "desc"]],
            "columnDefs": [
                {"orderable": false, "targets": [3]}
            ],
            "language": {
                "lengthMenu": "{{ trans('general.lengthMenu') }}",
                "zeroRecords": "{{ trans('general.zeroRecords') }}",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No rows found",
                "search": "Search",
                "infoFiltered": "{{ trans('general.infoFiltered') }}",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            },
            responsive: false
        });
    </script>
@endsection
