@extends('layouts.preBookBackend')

@section('content')

    <div class="block block-rounded">
        <br><br>
        <div class="block-header">
            <h3 class="block-title">Live Pre-Booking Slots</h3>
            <div class="block-options">
                <div class="block-options-item">

                </div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-vcenter">
                <thead>

                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Bookings</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;"></th>
                        <th class="text-center" style="width: 100px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (session()->has('delete'))
                        <div class="alert alert-danger mt-3">
                            {{ session()->get('delete') }}
                        </div>
                    @endif
                    @forelse ($bookings->reverse() as $booking)
                        @if (date('Y-m-d', strtotime($booking['date'])) == date('Y-m-d'))
                            <tr>
                                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                <td class="font-w600 font-size-sm">
                                    <a
                                        href="{{ route('prebooking', ['booking' => $booking->id]) }}">{{ $booking->title }}</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">

                                        {{-- <a href="{{ route('delete', ['booking' => $booking->id]) }}"> <button
                                                type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                                title="Remove Booking">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button></a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <div>No PreBookings Created</div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
