@extends('layouts.preBookbackend')

@section('content')
    <!-- Hero -->
    <div class="block-prebooking block block-rounded">
        <div class="block-header">
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
                        <td class="font-w600 font-size-sm">
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
                    {{-- <tr>
                        <th class="text-center" scope="row">5</th>
                        <td class="font-w600 font-size-sm">
                            <a href="#" class="table-link">Alloted Units</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="badge badge-prebooking">{{ $booking->display }}</div>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr> --}}
                    <tr>
                        <th class="text-center" scope="row">6</th>
                        <td class="font-w600 font-size-sm">
                            <a href="#" class="table-link">Units Left</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="badge badge-prebooking">{{ $booking->real }}</div>
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
    <div class=" form-prebooking ">
        <div class="content content-full">
            <form class="mb-5" method="POST">
                @csrf
                @include('errors')
                <div class="form-group">
                    <label class="label-prebooking" for="city">Select city</label>
                    <br>
                    @php
                        $cityMap = json_decode(file_get_contents(getcwd() . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'city.json'), true);
                        $selected = [];
                        echo "<select class='form-control input-prebooking sel' id='city' name='city' >";
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
                    <button type="submit" class="btn btn-prebooking">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->

    <!-- END Page Content -->
@endsection
