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

    public function success()
    {
        return view("clientbooking.success");
    }
    public function payment(PreBooking $booking, ClientPrebooking $user)
    {
        return view("clientbooking.payment", compact("booking", "user"));
    }
    public function checkout()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:test_e0d200504339b64f1dd4de5d4ad",
                "X-Auth-Token:test_1d1759dab919724e937ab434598"
            )
        );
        $payload = array(
            'purpose' => 'Pre-Book',
            'amount' => '2500',
            'phone' => '9999999999',
            'buyer_name' => 'John Doe',
            'redirect_url' => 'http://127.0.0.1:8000/success',
            'send_email' => true,
            'send_sms' => true,
            'email' => 'foo@example.com',
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        // echo '<pre>';
        // print_r($response);
        return redirect($response->payment_request->longurl);
    }
}
