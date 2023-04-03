@extends('Admin')

@section('Admin')
    <div class="card">


 <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('insert_roles') }}">
                @csrf

        <div class="auth-form-container text-start mx-auto">
            <form class="auth-form auth-signup-form">
                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        </div>

                <div class="password mb-3">
                    <label class="sr-only" for="signup-password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Your Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            <div class="password mb-3">
                    <label class="sr-only" for="signup-password">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Kindly confirm password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

                    <div class="tittle mb-3">
                        <select class="form-select" name="title" aria-label="Default select example" required placeholder="~~~~~~~">
                            <option selected></option>
                            <option value="Sales Manager">Sales Manager</option>
                            <option value="Stock Manager">Stock Manager</option>
                            <option value="Cashier">Cashier</option>
                            <option value="Admin">Admin</option>
                            <option value="Super Admin">Super Admin</option>
                          </select>
                    <br>
                         I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
                        </label>
                    </div>
                </div><!--//extra-->

                <div class="text-center">
                    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto"> {{ __('Register') }}</button>
                </div>
            </form><!--//auth-form-->

            <div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="login" >{{ __('Login') }}</a></div>
        </div><!--//auth-form-container-->
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> - --}}
      </div>
    </div>

        <div class="card-body" style width="60">

            <table id="example" class="table table-striped">


                <div class="row">
                    <div class="col-lg-4">
                        <thead>


                            <tr  style="background-color:coral">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>title</th>
                                <th>phone_no</th>
                                <th>Created_at</th>

                                <th>Updated_at</th>

                                <th>Action</th>

                            </tr>
</thead>

                            <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  title='add user' style="background-color:skyblue">


     <i class="fa fa-plus"></i>
     </button>


                        <tbody>
                            @foreach ($users as $i => $User)
                                <tr>

                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $User->name }}</td>
                                    <td>{{ $User->email }}</td>
                                    <td>{{ $User->title }}</td>
                                    <td>{{ $User->phone_no }}</td>
                                    <td>{{ $User->created_at }}</td>
                                    <td>{{ $User->updated_at }}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                              Actions button
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                              {{-- <li><a class="dropdown-item" href="{{ url('user_permit/').$User->id }}">Another action</a></li> --}}
                                              <li><a class="dropdown-item" href="{{ url('/permisions/'.$User->id )}}">Add/Edit permission <i class="fa fa-circle-plus"></i></a></li>
                                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                                              <li><a class="dropdown-item" href="{{ url('users/'.$User->id)}}">Remove User <i class="fa fa-circle-minus" style='color:red'> </a></i></li>
                                            </ul>
                                          </div>
                                        {{-- <a href="{{ url('useredit') . $User->id }}" title='view/edit'> <i class="fa fa-eye" --}}
                                            {{-- style='color:rgb(153, 49, 233)'></a></i> --}}


                                        {{-- <a button href="{{ url('usersdelete') . $User->id }}" title="delivery note" class="btn btn-primary">
                                            <i
                                            class="fa fa-car" style="color:rgb(35, 34, 34)"></i>
                                        </a> --}}

                                    </td>
                                </tr>
                        </tbody>

                            @endforeach
            </table>
        </div>
    </div>

        </div>

        {{-- <div class =row  {{ $users->links() }}>
        </div> --}}

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>

@endsection
