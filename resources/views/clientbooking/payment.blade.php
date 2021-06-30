@extends('layouts.preBookbackend')

@section('content')
    <!-- Hero -->
    <div class="block-prebooking block block-rounded">
        <div class="block-header">
            <h3 class="title-prebooking block-title">Payment</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <code></code>
                </div>
            </div>
        </div>
        <div class="block-content">
            <table class="table-showallbooking table table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;"></th>
                        <th>Details</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Fee</th>
                        <th class="text-center" style="width: 100px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($booking->slot === 'FREE' or $booking->slot === 'RENT')
                        <tr>

                            <th class="text-center" scope="row"></th>
                            <td class="font-w600 font-size-sm">
                                <a href="#" class="table-link">Rental Duration</a>
                            </td>
                            <td class="d-none d-sm-table-cell">

                                <select name="tot_pin_requested" onchange="myFunction();calculateAmount(this.value)"
                                    id="mySelect" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="{{ $booking->price }}">1 Month</option>
                                    <option value="{{ $booking->price_2month }}">2 Months</option>
                                </select>

                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                </div>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th class="text-center" scope="row"></th>
                        <td class="font-w600 font-size-sm">
                            @if ($booking->slot === 'FREE' or $booking->slot === 'RENT')
                                <a class="table-link" href="#">Pre-Book Rental Fee</a>
                            @endif
                            <a class="table-link" href="#">Pre-Book Sale Fee</a>
                        </td>
                        <td class="d-none d-sm-table-cell">

                            @if ($booking->slot === 'FREE')
                                Rs. 0
                            @elseif($booking->slot==='RENT')
                                Rs.<div id="demo"></div>
                            @elseif($booking->slot==='SALE')
                                Rs.{{ $booking->price }}
                            @endif

                        </td>
                        <td class="text-center">
                            <div class="btn-group">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row"></th>
                        <td class="font-w600 font-size-sm">

                            @if ($booking->slot === 'FREE' or $booking->slot === 'RENT')
                                <a class="table-link" href="#">Pre-Book Rental Fee after break-up</a>
                            @else
                                <a class="table-link" href="#">Pre-Book Sale Fee after break-up</a>
                            @endif
                        </td>
                        <td class="d-none d-sm-table-cell">
                            @if ($booking->slot === 'FREE')
                                <input class="" name="tot_amount" id="tot_amount" type="text" VALUE="Rs.0"
                                    readonly>(including GST)
                            @elseif($booking->slot === 'RENT')
                                <input class="" name="tot_amount" id="tot_amount" type="text" readonly>(including GST)
                            @else
                                Rs.{{ $booking->price + $booking->price * 0.18 }} (including GST)
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row"></th>
                        <td class="font-w600 font-size-sm">
                            <a class="table-link" href="#">Delivery Charges</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            Rs. XYZ
                        </td>
                        <td class="text-center">
                            <div class="btn-group">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row"></th>
                        <td class="font-w600 font-size-sm">
                            <a class="table-link" href="#">Total Amount</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            Rs. XYZ
                        </td>
                        <td class="text-center">
                            <div class="btn-group">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row"></th>
                        <td class="font-w600 font-size-sm">
                            <a class="table-link" href="#">Expected Delivery Date</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            7-8 Business Days
                        </td>
                        <td class="text-center">
                            <div class="btn-group">

                            </div>
                        </td>
                    </tr>
                    {{-- <tr>
                        <th class="text-center" scope="row"></th>
                        <td class="font-w600 font-size-sm">
                            <a class="table-link" href="be_pages_generic_profile.html">Susan Day</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-warning">Trial</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                    title="Edit Client">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                    title="Remove Client">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>

    <div class="form-group" style="margin-left:20px;margin-top:20px;">
        <a href="{{ route('checkout', ['booking' => $booking->id, 'user' => $user->id]) }}"><button type="button"
                class="btn btn-prebooking">Proceed To Checkout</button></a>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->

    <!-- END Page Content -->
    <script>
        function calculateAmount(val) {
            var price = val * 1;
            //display the result
            var tot_price = price + (price * 0.18);

            var divobj = document.getElementById('tot_amount');
            divobj.value = tot_price;
        }
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("mySelect").value;
            document.getElementById("demo").innerHTML = x;
        }
    </script>
@endsection
