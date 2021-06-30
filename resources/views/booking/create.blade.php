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
                                <label for="title">Title </label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                            </div>
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
                                    <option value="FREE" selected>FREE</option>
                                    <option value="RENT">RENTAL</option>
                                    <option value="SALE">SALE</option>
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
                                    placeholder="Enter PreBooking Price" disabled>
                            </div>
                            <div class="form-group">
                                <label for="price_2month">Price for 2 month(in Rs.)</label>
                                <input type="text" class="form-control" id="price_2month" name="price_2month"
                                    placeholder="Enter PreBooking Price" disabled>
                            </div>
                            <div class="form-group">
                                <label for="city">Select city</label>
                                @php
                                    $cityMap = json_decode(file_get_contents(getcwd() . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'city.json'), true);
                                    $selected = [];
                                    echo "<select multiple class='form-group sel' id='city' name='city[]'>";
                                    foreach ($cityMap as $city => $pincode) {
                                        $isSelected = '';
                                        if (in_array($pincode, $selected)) {
                                            $isSelected = 'selected';
                                        }
                                        echo "<option value='$pincode' $isSelected>";
                                        echo $city;
                                        echo '</option>';
                                    }
                                    echo '</select>';
                                @endphp
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
