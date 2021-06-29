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
        $bookingCities = explode(',', "$booking->city");
        if (in_array(request()->input('city'), $bookingCities)) {
            return redirect('/prebooking/' . $booking->id . '/verify/' . $user->id);
        }
        return redirect('/request');
    }
    public function request()
    {
        return view("clientbooking.request");
    }
    public function verify(PreBooking $booking, ClientPrebooking $user)
    {
        return view("clientbooking.verify");
    }
    public function verified(PreBooking $booking, ClientPrebooking $user)
    {
        return redirect('/prebooking/' . $booking->id . '/confirm/' . $user->id);
    }
    public function confirm(PreBooking $booking, ClientPrebooking $user)
    {
        return view("clientbooking.confirm", compact("booking", "user"));
    }
}
