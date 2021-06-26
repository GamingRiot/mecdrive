<?php

namespace App\Http\Controllers;

use App\Models\ClientBooking;
use App\Models\ClientPrebooking;
use Illuminate\Http\Request;

class PreBookingClientController extends Controller
{
    public function index()
    {
        return view("clientbooking.preBooking");
    }
    public function create()
    {
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
    }
}
