                                    <html>

                                    <head>
                                        <style>
                                            h1 {
                                                text-align: center;
                                            }

                                            p {
                                                text-align: center;
                                            }
                                           div {
                                                text-align: center
                                            }


                                            h3 {
                                                text-align: center;
                                            }

                                            tr {
                                                border-bottom: 1px solid #ddd;
                                            }

                                            th,
                                            td {
                                                border-color: #96D4D4;
                                            }

                                            td,
                                            th {
                                                border: 1px solid #dddddd;
                                                text-align: left;
                                                padding: 8px;
                                            }

                                            tr:nth-child(even) {
                                                background-color: #dddddd;
                                            }
                                        </style>
                                           </head>
                                    <div>
                                        <img class="logo-icon me-2"
                                        src="assets/images/logo.jpg" alt="logo" style="width:150px;align-center;">

                                    {{-- </a> --}}

                                </div>
                                        {{-- <img src="{{ asset('assets/images/logo.jpg') }}" alt="Flowers in Chania"> --}}

                                        <h1>INVOICE</h1>

                                        <p>OneMile Farms Limited, Mikocheni B, Wastaafu street, Block D, Plotnumber
                                            396<br>
                                            House number 16, P.O. Box 32440, Dar es Salaam
                                            Tanzania.<br>
                                            +255 752 111, +255 737 584 116, +255 699 561 115<br>
                                            Sales@onemilefarms.co.tz,Info@onemilesfarms.co.tz, <br> www.onefarms.co.tz

                                        <table class="table table-striped" style="width:95%";float:center;>
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                            </thead>
                                            </tr>
                                            <tbody>
                                                <tr>

                                                    <td style='text-align:left'>Customer Name:
                                                        {{ $invo->CustomerName }}<br>

                                                        <p style='text-align:left'>Address:
                                                            {{ $invo->Customer_address }}<br> </p>

                                                        <p style='text-align:left'>Phone:
                                                            {{ $invo->Customer_phone_no }}<br></p>
                                                    </td>


                                                    <td style='text-align:right'>Invoice No:{{ $invo->invId }}

                                                        <p style='text-align:right'>Date: {{ $invo->created_at }} </p>
                                                    </td>


                                                </tr>
                                            </tbody>
                                        </table>
                                        <br><br>

                                        <table class="table table-striped" style="width:100%";>

                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">QTY</th>
                                                    <th style="text-align:center">Particulars</th>
                                                    <th style="text-align:center">Unit Price</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sales as $sale)
                                                    <tr>
                                                        <td style="text-align:center">{{ $sale->quantity }}</td>
                                                        <td style="text-align:center">{{ $sale->name }}</td>
                                                        <td style="text-align:center">{{ $sale->price }}</td>

                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <br> <b> TOTAL</b>
                                                    </td>
                                                    <td>
                                                    </td>

                                                    <br>
                                                    <td style="text-align:center"><b>{{ $invo->txamount }}</td>
                                                    </b>

                                                </tr>

                                            </tbody>
                                        </table>
                                        </div>
                                        <br><br>
                                        <p><b>Payment Terms:</b>
                                            Payment term within 30 days after receiving this invoice through our account numbers:
                                            <p>  That the payments shall be effected to the<b> account number:</b><b>0150305942500 </b>Account  <br>Name: Onemile Farms Limited Bank: CRDB and the pay slip shall be presented to the supplier by any convenient means for record purposes.<br> Alternately payment may be made through <b>account number: </b><b>22510061683</b>, account name: Onemile Farms Limited, Bank: NMB</p>


                                        </p>
                                        </body>

                                        </div>
                                        </div>

                                    </html>
