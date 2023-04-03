@extends('Admin')

@section('Admin')

<style>

    .select2-container .select2-selection--single{
        height:34px !important;
    }
    .select2-container--default .select2-selection--single{
             border: 1px solid #ccc !important;
         border-radius: 0px !important;
    }

    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    {{-- <form action="{{ url('cart') }}" method="GET">
        <input type="text" name="search" required/>
        <button type="submit">Search</button>
    </form> --}}
<div class="card">
    <div class="card-body">


    <div class="row">
        <div class="col-md-7">
            <div class="row">
                @foreach ($items as $var)
                    <div class="col-sm-4">
                        <div class="card mb-3">
                            <div calss=card-body>
                                <div class=>
                                    <img src="{{ asset($var->path) . '/' . $var->name }}" style="width:100%; height:190px">


                                    <center>
                                        <b>Price:</b> {{ number_format( $var->sale_price) }}.00Tzs <br>
                                        {{ $var->item_name }}



                                    </center>

                                    <form action="{{ url('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $var->id }}" name="id">
                                        <input type="hidden" value="{{ $var->item_name }}" name="name">
                                        <input type="hidden" value="{{ $var->sale_price }}" name="sale_price">
                                        <input type="hidden" img src="{{ asset($var->path) . '/' . $var->name }}"
                                            name="image">
                                        <input type="hidden" value="1"  name="quantity">
                                        <center>
                                            {{-- <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button> --}}
                                            <button type="submit" class="btn btn-warning" style=margin-bottom:10px i
                                                class="fa fafa-cart">Add to Cart</button>
                                    </form>
                                </div>

                                {{-- <p>{{ $items->links() }}</p> --}}
                                </center>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </center>
        <div class="col-md-5">
            <div class="card">
                <div class='card-body'>
                    <main class="my-8">
                        <div class="container px-6 mx-auto">
                            <div class="flex justify-center my-6">
                                <div
                                    class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                                    @if ($message = Session::get('success'))
                                        <div class="p-4 mb-3 bg-green-400 rounded">
                                            <p class="text-green-800">{{ $message }}</p>
                                        </div>
                                    @endif

                                    {{-- <form method="post" action="" enctype="multipart/form-data">
                                         @csrf --}}
                                         {{-- <form action="{{ route('cart.checkout') }}" method="POST">
                                            @csrf --}}
                                    {{-- <select name="customerId" class="form-select" aria-label="Default select example" >
                                            <option value="" selected>Select Customer</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}" name="Customer_name" required>{{ $customer->Customer_name }}
                                                </option>
                                            @endforeach
                                        </select> --}}

                                        <h5 style = 'text-align:center' class="text-3xl text-bold">Cart List ({{ Cart::getTotalQuantity() }})</h5>
                                        <div class="flex-1">
                                            <table class="w-full text-sm lg:text-base" cellspacing="0">
                                                <thead>
                                                    <tr class="h-12 uppercase">
                                                        <th class="hidden md:table-cell"></th>
                                                        <th class="text-left">Name</th>
                                                        <th class="pl-5 text-left lg:text-right lg:pl-0">
                                                            <span class="hidden lg:inline">Quantity</span>
                                                        </th>
                                                        <th class="hidden text-right md:table-cell"> price</th>
                                                        <th class="hidden text-right md:table-cell"> Remove </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cartItems as $item)
                                                        <tr>
                                                            <td class="hidden pb-4 md:table-cell"
                                                                style="width:50%  height:50px">
                                                                <a href="#">
                                                                    {{-- <img src="{{ asset($var->path) . '/' . $var->name }}" class="w-100 rounded" alt="Thumbnail"> --}}
                                                                </a>
                                                            </td>

                                                            <td>
                                                                <a href="#">
                                                                    <span class="text-sm font-medium lg:text-base">{{ $item->name }}</span>

                                                                </a>
                                                            </td>
                                                            <td class="justify-center mt-6 md:justify-end md:flex">
                                                                <div class="h-10 w-28">
                                                                    <div class="relative flex flex-row w-full h-8">

                                                                        <form action="{{ route('cart.update') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $item->id }}">
                                                                            <input type="number" name="quantity"
                                                                                value="{{ $item->quantity }}"style=width:50px
                                                                                class="w-6 text-center bg-gray-300" />
                                                                            <button type="submit"
                                                                                class='btn btn-primary'style="">Add</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="hidden text-right md:table-cell">
                                                                <span class="text-sm font-medium lg:text-base">
                                                                    Tzs {{number_format ($item->price) }}
                                                                </span>
                                                            </td>
                                                            <td class="hidden text-right md:table-cell">
                                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $item->id }}"
                                                                        name="id">
                                                                    <button class="btn btn-close"></button>
                                                                </form>

                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table><br>
                                            <div class="align-content-center">
                                                <b style = "align-text:'center'">Total: TZS {{ number_format(Cart::getTotal() )}}</b>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="btn-group">


                                                    <form class="" action="{{ route('cart.checkout')}}" method="POST" class="form-group">
                                                        @csrf

                                                        <div class="container">
                                                            <div class="row">
                                                                {{-- <form class="col-md-4"> --}}
                                                                    {{-- <label>Select</label> --}}
                                                                    <select  name="customerId" class="form-control select2" required>
                                                                        <option value="" selected>Select Customer</option>
                                                                       @foreach ($customers as $customer)
                                                                       <option value="{{ $customer->id }}" name="Customer_name" required>{{ $customer->Customer_name }}
                                                                       </option>
                                                                   @endforeach
                                                               </select><br><br>
                                                                    </select>
                                                                    <button class="btn btn-warning btn-sm"
                                                                    style="margin-left: 10px;margin-right:100%, float:center, width:50px">Checkout
                                                                </button>

                                                                </form>
                                                             </div>
                                                        </div>
                                                        <script>
                                                            $('.select2').select2();
                                                        </script>



{{--
                                                         <select name="customerId" class="form-control form-select" aria-label="Default select example"required >
                                                            <option value="" selected>Select Customer</option>
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->id }}" name="Customer_name" required>{{ $customer->Customer_name }}
                                                                </option>
                                                            @endforeach
                                                        </select><br> --}}
                                                        {{-- <button class="btn btn-warning btn-sm"
                                                            style="margin-left: 10px;margin-right:10%, float:center">Checkout
                                                        </button>
                                                    </form> --}}
                                                    {{-- <a href="{{ route('cart.list') }}" class="btn btn btn-outline-success"
                                                        style="margin-left: 16px;"> view cart
                                                        </a> --}}
                                                         <a href="" class=""
                                                        style="margin-left: 16px;">
                                                        </a>
                                                    <form action="{{ route('cart.clear') }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm"
                                                            style="margin-right: 20px;">Remove All Cart</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </main>
                @endsection
