@extends('layouts.preBookbackend')

@section('content')
    <!-- Hero -->
    <div class="block-prebooking block block-rounded block-confirm">
        <div class="block-header block-confirm">
            <h3 class="title-prebooking block-title">Pre-Booking Details</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <code></code>
                </div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-vcenter">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;"></th>
                        <th class="text-center" style="width: 100px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="text-center" scope="row">1</th>
                        <td class="font-w600 font-size-sm ">
                            <a href="#" class="table-link">Prebooking Type:</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="badge badge-prebooking">{{ $booking->slot }}</div>
                        </td>
                        <td class="text-center">
                            {{-- <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                    title="Edit Client">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                    title="Remove Client">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div> --}}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">2</th>
                        <td class="font-w600 font-size-sm">
                            <a href="#" class="table-link">Date</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="badge badge-prebooking">{{ $booking->date->format('d-m-y') }}</div>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">3</th>
                        <td class="font-w600 font-size-sm">
                            <a href="#" class="table-link">Start Time</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="badge badge-prebooking">{{ date('G:i', strtotime($booking->start_time)) }}</div>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">4</th>
                        <td class="font-w600 font-size-sm">
                            <a href="#" class="table-link">End Time</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="badge badge-prebooking">{{ date('G:i', strtotime($booking->end_time)) }}</div>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">5</th>
                        <td class="font-w600 font-size-sm">
                            <a class="table-link"href="#">Alloted Units</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-prebooking">{{ $booking->real }}</span>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">6</th>
                        <td class="font-w600 font-size-sm">
                            <a class="table-link"href="#">Units Left</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-prebooking">{{ $booking->display }}</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-prebooking">
        <div class="content content-full">
            <form class="mb-5" method="GET">
                @csrf
                @include('errors')
                <div class="form-group">
                    <label class="label-prebooking"for="name">Name</label>
                    <input type="text" class="form-control input-prebooking" id="name" name="name" value="{{ $user->name }}" disabled>
                </div>
                <div class="form-group">
                    <label class="label-prebooking"for="email">Email</label>
                    <input type="email" class="form-control input-prebooking" id="email" name="email" value="{{ $user->email }}" disabled>
                </div>
                <div class="form-group">
                    <label class="label-prebooking"for="mobile">Mobile Number</label>
                    <input type="text" class="form-control input-prebooking" id="mobile" name="mobile" value="{{ $user->mobile }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label class="label-prebooking"for="address">Address</label>
                    <input type="text" class="form-control input-prebooking" id="address" name="address" value="{{ $user->address }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label class="label-prebooking"for="state">Select State</label>
                    <select class="form-control input-prebooking sel" id="state" name="state" value="{{ $user->state }}" disabled>
                        <option value="{{ $user->state }}">{{ $user->state }}</option>
                        {{-- <option value="Andhra Pradesh">Andhra Pradesh</option>
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
                        <option value="West Bengal">West Bengal</option> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label class="label-prebooking"for="city">Select city</label>
                    <br>
                    @php
                        $cityMap = json_decode(file_get_contents(getcwd() . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'city.json'), true);
                        $selected = explode(',', "$user->city");
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
                <div class="form-group">
                    <label class="label-prebooking"for="pincode">Pincode</label>
                    <input type="text" class="form-control input-prebooking" id="pincode" name="pincode" value="{{ $user->pincode }}"
                        disabled>
                </div>
                <div class="form-group">
                    <a href="{{ route('payment', ['booking' => $booking->id, 'user' => $user->id]) }}"><button
                            type="button" class="btn btn-prebooking">Proceed To Checkout</button></a>
                </div>
            </form>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->

    <!-- END Page Content -->
@endsection
