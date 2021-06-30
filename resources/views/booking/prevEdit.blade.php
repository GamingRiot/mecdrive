@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit
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
                @include('errors')
                @if (session()->has('success'))
                    <div class="alert alert-success mt-3">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="row push">
                    <div class="col-lg-8 col-xl-8">
                        <div class="form-group">
                            <label for="title">Title </label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $booking->title }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="date">Date of Pre-Booking</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="date" name="date"
                                value="{{ $booking->date }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="start_time">Start Time(12-hour format)</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="start_time" name="start_time"
                                data-enable-time="true" data-no-calendar="true" data-date-format="H:i"
                                data-time_24hr="false" value="{{ $booking->start_time }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="end_time">End Time(12-hour format)</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="end_time" name="end_time"
                                data-enable-time="true" data-no-calendar="true" data-date-format="H:i"
                                data-time_24hr="false" value="{{ $booking->end_time }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="slot">Select</label>
                            <select class="selectpicker form-control" id="slot" name="slot" disabled>
                                <option value="FREE" @if (strtoupper($booking->slot) === 'FREE') selected @endif>FREE</option>
                                <option value="RENT" @if (strtoupper($booking->slot) === 'RENT') selected @endif>RENTAL</option>
                                <option value="SALE" @if (strtoupper($booking->slot) === 'SALE') selected @endif>SALE</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="display">Number of Display Units</label>
                            <input type="text" class="form-control" id="display" name="display"
                                value="{{ $booking->display }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="real">Number of Real Units</label>
                            <input type="text" class="form-control" id="real" name="real" value="{{ $booking->real }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="price">Price(in Rs.)</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $booking->price }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="price_2month">Price for 2 month(in Rs.)</label>
                            <input type="text" class="form-control" id="price_2month" name="price_2month"
                                value="{{ $booking->price_2month }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="city">Multiple Select</label>
                            @php
                                
                                $cityMap = json_decode(file_get_contents(getcwd() . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'city.json'), true);
                                $selected = explode(',', "$booking->city");
                                
                                echo "<select multiple class='form-group sel' id='city' name='city[]' disabled>";
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


                    </div>
                </div>

                <!-- END Your Block -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
