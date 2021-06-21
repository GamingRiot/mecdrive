@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">
@endsection
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Create Pre-Booking
                </h1>

            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Basic -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Fill the required details</h3>
            </div>
            <div class="block-content block-content-full">
                <form method="POST">
                    @include('errors')
                    @csrf
                    @if (session()->has('success'))
                        <div class="alert alert-success mt-3">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="row push">
                        <div class="col-lg-8 col-xl-8">
                            <div class="form-group">
                                <label for="date">Date of Pre-Booking</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="date" name="date"
                                    placeholder="Y-m-d">
                            </div>
                            <div class="form-group">
                                <label for="start_time">Start Time(12-hour format)</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="start_time"
                                    name="start_time" data-enable-time="true" data-no-calendar="true" data-date-format="H:i"
                                    data-time_24hr="false">
                            </div>
                            <div class="form-group">
                                <label for="end_time">End Time(12-hour format)</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="end_time" name="end_time"
                                    data-enable-time="true" data-no-calendar="true" data-date-format="H:i"
                                    data-time_24hr="false">
                            </div>
                            <div class="form-group">
                                <label for="slot">Select</label>
                                <select class="selectpicker form-control" id="slot" name="slot">
                                    <option value="FR">FREE</option>
                                    <option value="RT">RENTAL</option>
                                    <option value="SL">SALE</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="display">Number of Display Units</label>
                                <input type="text" class="form-control" id="display" name="display"
                                    placeholder="Enter display units">
                            </div>
                            <div class="form-group">
                                <label for="real">Number of Real Units</label>
                                <input type="text" class="form-control" id="real" name="real"
                                    placeholder="Enter real units">
                            </div>
                            <div class="form-group">
                                <label for="price">Price(in Rs.)</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Enter PreBooking Price">
                            </div>
                            <div class="form-group">
                                <label for="state">Multiple Select</label>
                                <select class="form-control" id="state" name="state[]" multiple>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="terms">Terms And Conditions</label>
                                <textarea class="form-control" id="terms" name="terms" rows="4"
                                    placeholder="Enter Terms and Conditions"></textarea>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>
                </form>
                <!-- END Your Block -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

@endsection
