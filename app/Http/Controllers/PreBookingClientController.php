<?php

namespace App\Http\Controllers;

use App\Models\ClientBooking;
use App\Models\ClientPrebooking;
use App\Models\PreBooking;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Nexmo;

class PreBookingClientController extends Controller
{
    public function index()
    {
        $bookings = PreBooking::all();
        return view("clientbooking.showAllBooking", compact("bookings"));
    }
    public function show(PreBooking $booking)
    {
        return view("clientbooking.preBooking", compact("booking"));
    }
    public function create(PreBooking $booking)
    {
        // $verification = Nexmo::verify()->start([]);
        $validatedRequest = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'mobile' => 'required|integer|min:10',
            'address' => 'required|min:5',
            'city' => 'required',
            'state' => 'required|',
            'pincode' => 'required|',
        ]);
        $user = new ClientPrebooking($validatedRequest);
        $user->save();
        // if (request()->input('city') != $booking->city) {
        //     return redirect('/request');
        // }
        $booking = explode(',', "$booking->city");
        if (in_array(request()->input('city'), $booking)) {
            return redirect('/verify');
        }
        return redirect('/request');
    }
    public function request()
    {
        return view("clientbooking.request");
    }
    public function verify()
    {
        return view("clientbooking.verify");
    }
}
