@extends('Admin')
@section('Admin')
    <script type="text/javascript">
        function do_this() {

            var checkboxes = document.getElementsByClassName('checklist');
            var button = document.getElementById('toggle');

            if (button.value == 'select') {
                for (var i in checkboxes) {
                    checkboxes[i].checked = 'FALSE';
                }
                button.value = 'Deselect'
            } else {
                for (var i in checkboxes) {
                    checkboxes[i].checked = '';
                }
                button.value = 'Check All';
            }
        }
    </script>
    </head>

    @if (session('status'))
        {
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('status') }}</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        }
    @else
    @endif

    <div class=card>

        <div class=card-body>

            <form class="row g-4" action="{{ url('permisions/' . $User->id) }}" method="post">
                @csrf
                {{-- //<div class="tittle mb-3">
    <select class="form-select" name="title" aria-label="Default select example" required placeholder="~~~~~~~">
        <option selected></option>
        <option value="Sales Manager">Sales Manager</option>
        <option value="Stock Manager">Stock Manager</option>
        <option value="Cashier">Cashier</option>
        <option value="Admin">Admin</option>
        <option value="Super Admin">Super Admin</option>
      </select> --}}
                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Role</label>
                    <input type="text" class="form-control" name="title" value="{{ $User->title }}"
                        id="inputPassword2" placeholder="Role">
                    <div class="form-check">
                        <input class="form-check-input" id="toggle" value="select" onClick="do_this()" type="checkbox"
                            value="" id="defaultCheck">
                        <label class="form-check-label" for="defaultCheck1">
                            Check All
                        </label>
                    </div>
                </div>
                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Username</label>
                    <input type="text" class="form-control" name="name" value="{{ $User->name }}"
                        id="inputPassword2" placeholder="Username">
                    <div class="form-check">
                        <input class="form-check-input checklist" name='inventory' value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            <b>Inventrory</b>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input checklist" name="overview" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Overview
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input checklist" name="overview0" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                           Dashboard/overview
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input checklist" name='adding_items' value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Adding Items
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input checklist" name=" processed_stock" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Processed_stock
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input checklist" name="items" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Items
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input checklist" name="incoming_stock" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Incoming Stock
                        </label>
                    </div>
                </div>

                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Password</label>
                    <input type="password" name="password" value="{{ $User->password }}" class="form-control"
                        id="inputPassword2" placeholder="Password">

                    <div class="form-check">
                        <input class="form-check-input checklist" name="operations" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            <b> External/operations</b>
                        </label>
                    </div>


                    <div class="form-check">
                        <input class="form-check-input checklist" name="add_category" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Add Category
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input checklist" name="invoices" value="1" type="checkbox"
                            value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Invoices
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input checklist" name="meat_category" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Meats category
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input checklist" name="sales" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Sales
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input checklist" name="customers" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Customers
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input checklist" name="users" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Users
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input checklist" name="suppliers" value="1" type="checkbox"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Suppliers
                        </label>
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3" style="background-color:coral">Save Info</button>
                </div>



                {{-- <input type="button" id="toggle" value="select" onClick="do_this()" style="width:5%;height:5%; float-center" /> --}}




        </div>
    </div>
    </form>

    <div>

        <script>
            $('#select-all').click(function(event) {
                if (this.checked) {
                    $(':checkbox').prop('checked', true);
                } else {
                    $(':checkbox').prop('checked', false);
                }
            });
        </script>
    @endsection
