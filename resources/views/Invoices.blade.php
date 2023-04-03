@extends('Admin')

@section('Admin')
    <style>
        td {
            /* font-family:Arial, Helvetica, sans-serif; */
            font-size: 16px;
        }
        tr:hover {background-color: coral;}
    </style>

    <link rel="stylesheet" href="    https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css
    ">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.semanticui.min.css
    ">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">



    <div class=card style=width:100%>
        <div class=card-body>

            <table class="table table-striped" id="example" style="width:100%">

                <thead>
                    <tr style="background-color:coral">
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Customer Phone no</th>
                        <th>Customer Email</th>
                        <th>Customer Address</th>

                        <th> Total Amount</th>
                        <th> Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($invo as $i => $invos)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $invos->CustomerName }}</td>
                            <td>{{ $invos->Customer_phone_no }}</td>
                            <td>{{ $invos->Customer_email }}</td>
                            <td>{{ $invos->Customer_address }}</td>

                            <td>{{ $invos->txamount }}</td>
                            <td>{{ $invos->status }}</td>
                            {{-- <td>{{ Auth::user()->name }}</td> --}}
                            <td>



                                <a button href="{{ url('Invoices/' . $invos->invId) }}" class="btn btn-primary btn-sm">
                                    Pay
                                </a>

                                <a button href="{{ url('Invoiceview/' . $invos->salesId) }}" style="color:rgb(56, 74, 235)"
                                    title="print invoice" class="btn btn-primary btn-sm">
                                    <i class="fa fa-print" style="color:rgb(11, 10, 10)"></i>

                                </a>
                                <a button href="{{ url('delivery_note/' . $invos->salesId) }}" title="delivery note"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-car" style="color:rgb(35, 34, 34)"></i>
                                </a>



                            </td>
                        </tr>

                        {{--
{{--
                    <!-- Modal -->
                    <div class="modal fade" id="view{{ $invo->salesId }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Invoice Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class=row>
                                        <div class=col-sm-4>
                                            <b> Company Details</b>
                                            {{ $invo->Company_name }}
                                            {{ $invo->Comphone_no }}
                                            {{ $invo->email }}
                                        </div>
                                        <div class=col-sm-4>
                                            <b> Customer Details</b>
                                            {{ $invo->CustomerName }}
                                            {{ $invo->Customer_phone_no }}
                                            {{ $invo->Customer_email }}
                                            {{ $invo->Customer_address }}
                                        </div>

                                        <div class=col-sm-4>
                                            <b> Invoice Details</b>
                                            Invoice No:{{ $invo->invId }}
                                            Invoice Date: {{ $invo->created_at }}
                                            Status: <b> {{ $invo->status }}</b>
                                        </div>

                                    </div>

                                    <h5 style="text-align: center">ITEMS DESCRIPTION</h5><br>








                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button onClick="printOut('printIt')" class="btn btn-primary fa fa-print">
                                            Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @endforeach
                </tbody>
            </table>




            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
        @endsection
