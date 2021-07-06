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
                            <label for="start_time">Start Time(24-hour format)</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="start_time" name="start_time"
                                data-enable-time="true" data-no-calendar="true" data-date-format="H:i"
                                data-time_24hr="false" value="{{ $booking->start_time }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="end_time">End Time(24-hour format)</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="end_time" name="end_time"
                                data-enable-time="true" data-no-calendar="true" data-date-format="H:i"
                                data-time_24hr="false" value="{{ $booking->end_time }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="slot">Select</label>
                            <select class="selectpicker form-control" id="slot" name="slot" disabled>
                                <option value="null">Choose an option</option>
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
                            <label for="price" id="price_1month">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">₹</span></div>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ $booking->price }}" disabled>
                            </div>
                        </div>
                        <div class="form-group price_month_container">
                            <label for="price_2month">Price for 2 month(in Rs.)</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">₹</span></div>
                                <input type="text" class="form-control" id="price_2month" name="price_2month"
                                    value="{{ $booking->price_2month }}" disabled>
                            </div>
                        </div>
                        <div class="form-group price_month_container">
                            <label for="price_3month">Price for 3 month(in Rs.)</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">₹</span></div>
                                <input type="text" class="form-control" id="price_3month" name="price_3month"
                                    value="{{ $booking->price_3month }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link">Product link</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{ $booking->link }}"
                                disabled>
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
    <style>
        .price_month_container {
            display: none;
        }

        .price_month_container.show {
            display: block;
        }

    </style>
    <script>
        const validateTime = () => {
            const prebookingDate = document.getElementById("date");
            const startTime = document.getElementById("start_time")
            const endTime = document.getElementById("end_time")
            const startTimeValidation = document.getElementById("start_time_validation");
            const formSubmit = document.getElementById("form_submit");
            const duration = document.getElementById("duration");
            const slot = document.getElementById("slot");

            function onChangeStartTime() {
                startTimeValidation.innerHTML = ""
                const startTimeParts = startTime.value.split(":")
                const prebookingDateParts = prebookingDate.value.split("/")
                const currentDate = new Date((new Date()).setHours((new Date()).getHours() + 6));
                const checkDate = new Date(prebookingDateParts[2], parseInt(prebookingDateParts[0]) - 1,
                    prebookingDateParts[
                        1], startTimeParts[0], startTimeParts[1]);
                console.log(currentDate, checkDate)
                if (currentDate > checkDate) {
                    startTimeValidation.innerHTML = "Start time must be atleast 6 hours apart from now.";
                    formSubmit.disabled = true;
                } else {
                    formSubmit.disabled = false;
                }
            }

            startTime.addEventListener("change", onChangeStartTime);
            startTime.addEventListener("click", onChangeStartTime);
            startTime.addEventListener("focus", onChangeStartTime);
            startTime.addEventListener("blur", onChangeStartTime);

            slot.addEventListener("change", (event) => {
                if (event.target.value == "FREE") {
                    document.getElementById("price").value = 0
                }
                if (event.target.value == "RENT") {
                    document.getElementById("price").value = ""
                    document.getElementById("price_1month").innerHTML = "Price for 1 month(in Rs.)";

                    for (let index = 0; index < document.getElementsByClassName("price_month_container")
                        .length; index++) {
                        const element = document.getElementsByClassName("price_month_container")[index];
                        element.classList.add("show")
                    }

                } else {
                    // document.getElementById("price").value = ""
                    document.getElementById("price_1month").innerHTML = "Price(in Rs.)";
                    for (let index = 0; index < document.getElementsByClassName("price_month_container")
                        .length; index++) {
                        const element = document.getElementsByClassName("price_month_container")[index];
                        element.classList.remove("show")
                    }
                }
                if (event.target.value == "SALE") {
                    document.getElementById("price").value = ""
                }
            })

            endTime.addEventListener("change", () => {
                const startTimeParts = startTime.value.split(":");
                const endTimeParts = endTime.value.split(":");
                const startTimeHours = parseInt(startTimeParts[0]);
                const startTimeMinutes = parseInt(startTimeParts[1]);
                const endTimeHours = parseInt(endTimeParts[0]);
                const endTimeMinutes = parseInt(endTimeParts[1]);
                let durationHours = endTimeHours - startTimeHours;
                let durationMinutes = endTimeMinutes - startTimeMinutes;
                if (durationMinutes < 0) {
                    durationMinutes = Math.abs(durationMinutes);
                    durationHours -= 1;
                }
                duration.value = durationHours + " hours " + durationMinutes + " minutes";
            })

        }
        validateTime();
    </script>
@endsection
