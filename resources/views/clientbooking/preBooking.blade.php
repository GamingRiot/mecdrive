@extends('layouts.preBookbackend')

@section('content')
    <!-- Hero -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">Pre-Booking Details</h3>
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
                        <td class="font-w600 font-size-sm">
                            <a href="#">Prebooking Type:</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-danger">{{ $booking->slot }}</span>
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
                            <a href="#">Date</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-info">{{ $booking->date->format('d-m-y') }}</span>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">3</th>
                        <td class="font-w600 font-size-sm">
                            <a href="#">Start Time</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-info">{{ date('G:i', strtotime($booking->start_time)) }}</span>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">4</th>
                        <td class="font-w600 font-size-sm">
                            <a href="#">End Time</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-danger">{{ date('G:i', strtotime($booking->end_time)) }}</span>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">5</th>
                        <td class="font-w600 font-size-sm">
                            <a href="#">Alloted Units</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-info">{{ $booking->real }}</span>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">6</th>
                        <td class="font-w600 font-size-sm">
                            <a href="#">Units Left</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-primary">{{ $booking->display }}</span>
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
    <div class="bg-body-light">
        <div class="content content-full">
            <form class="mb-5" method="POST">
                @csrf
                @include('errors')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email..">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Your mobile number">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Your address ">
                </div>
                <div class="form-group">
                    <label for="state">Select State</label>
                    <select class="form-control sel" id="state" name="state">
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
                <div class="form-group">
                    <label for="city">Select city</label>
                    <br>
                    @php
                        $cityMap = json_decode(file_get_contents(getcwd() . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'city.json'), true);
                        $selected = [];
                        echo "<select class='form-control sel' id='city' name='city' >";
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
                    <label for="pincode">Pincode</label>
                    <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Your pincode">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->

    <!-- END Page Content -->
@endsection
