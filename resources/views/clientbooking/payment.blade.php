@extends('layouts.preBookbackend')

@section('content')
    <!-- Hero -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">Payment</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <code></code>
                </div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-vcenter">
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
                                <a href="#">Rental Duration</a>
                            </td>
                            <td class="d-none d-sm-table-cell">

                                <select name="tot_pin_requested" onchange="calculateAmount(this.value)" required>
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
                                <a href="#">Pre-Book Rental Fee</a>
                            @endif
                            <a href="#">Pre-Book Sale Fee</a>
                        </td>
                        <td class="d-none d-sm-table-cell">

                            @if ($booking->slot === 'FREE')
                                Rs. 0
                            @elseif($booking->slot==='RENT')
                                Rs.{{ $booking->price }}
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
                                <a href="#">Pre-Book Rental Fee after break-up</a>
                            @endif
                            <a href="#">Pre-Book Sale Fee after break-up</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            @if ($booking->slot === 'FREE' or $booking->slot === 'RENT')
                                <input class="" name="tot_amount" id="tot_amount" type="text" readonly>(including GST)
                            @endif
                            Rs.{{ $booking->price + $booking->price * 0.18 }} (including GST)
                        </td>
                        <td class="text-center">
                            <div class="btn-group">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row"></th>
                        <td class="font-w600 font-size-sm">
                            <a href="#">Delivery Charges</a>
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
                            <a href="#">Total Amount</a>
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
                            <a href="#">Expected Delivery Date</a>
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
                            <a href="be_pages_generic_profile.html">Susan Day</a>
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

    <div class="form-group" style="margin-left:20px;">
        <a href="{{ route('checkout', ['booking' => $booking->id, 'user' => $user->id]) }}"><button type="button"
                class="btn btn-primary">Proceed To Checkout</button></a>
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
@endsection
