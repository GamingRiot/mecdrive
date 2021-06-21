@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="content">
        <div class="row">
            <div class="col-xl-10">
                <!-- Default Table -->
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">Booking</h3>
                        <div class="block-options">

                        </div>
                    </div>
                    <div class="block-content">
                        <h2>Date:{{ $booking->date->format('d-m-Y') }}</h2>
                        <h3>Start Time:{{ $booking->start_time }}</h3>
                        <h3>End Time:{{ $booking->end_time }}</h3>
                        <h3>Display Units:{{ $booking->display }}</h3>
                        <h3>Real Units:{{ $booking->real }}</h3>
                        <h3>Rs.{{ $booking->price }}</h3>
                        <h3>Slot:{{ $booking->slot }}</h3>
                        <h3>States:{{ $booking->state }}</h3>

                    </div>
                </div>
                <!-- END Default Table -->
            </div>
            <!-- END Page Content -->
        @endsection
