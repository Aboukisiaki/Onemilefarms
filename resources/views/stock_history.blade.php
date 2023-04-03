

  @extends('Admin')

  @section('Admin')



  <div class="card">


      <div class="card-body" style width="60%">


  <table id="data-table" class="table table-striped">

      <div class="row">
         <div class="col-lg-12">
      <thead>


      <tr>
                          <th>ID</th>

                          <th>Add Stock</th>
                          <th>Out Stock</th>
                          <th>Old Stock</th>
                          <th>Current Stock</th>
                          <th>Status</th>
                          <th>By</th>
                          <th>Date</th>

                      </tr>
                  </thead>
                  <tbody>
                     @foreach ($histry as $i=> $materials)

                      <tr>

                          <td>{{$i}}</td>

                           <td>{{$materials->added_qty}}</td>
                            <td>{{$materials->out_qty}}</td>
                            <td>{{$materials->old_qty}}</td>
                           <td>{{$materials->current_qty}}</td>
                           <td>
                            @if ($materials->added_qty != null)
                                Added
                            @else
                            removed
                            @endif
                        </td>
                       <td>{{ $materials->by }}</td>

                             <td>{{$materials->created_at}}</td>
                                          </tr>
                      @endforeach





                                                      <script src="{{ asset('backend2/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>


                                                      <script>

                                              $('#data-table').DataTable({
                                              "order": [[0, "asc"]],
                                              "columnDefs": [
                                              {"orderable": false, "targets": [3]}
                                              ],
                                              "language": {
                                              "lengthMenu": "{{ trans('Menu') }}",
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
