<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreBookingClientController extends Controller
{
    public function index()
    {
        return view("clientbooking.preBooking");
    }
}
