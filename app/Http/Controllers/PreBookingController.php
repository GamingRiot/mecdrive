<?php

namespace App\Http\Controllers;

use App\Models\PreBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PreBookingController extends Controller
{
    public function index()
    {
        $bookings = PreBooking::all();
        return view("booking.showBooking", compact("bookings"));
    }
    public function create()
    {
        return view("booking.create");
    }
    public function store()
    {
        $validatedRequest = request()->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'slot' => 'required',
            'display' => 'required|integer',
            'real' => 'required|integer',
            'state' => 'required',
            'price' => 'integer',
            'title' => 'required|min:3'
        ]);
        $booking = new PreBooking($validatedRequest);
        $booking->state = implode(",", $validatedRequest['state']);
        $booking->save();
        return redirect()->back()->with("success", "PreBooking Created!");
    }
    public function upcomeEdit(PreBooking $booking)
    {
        return view("booking.upcomeEdit", compact("booking"));
    }
    public function upcomeUpdate(PreBooking $booking)
    {
        $user = PreBooking::where("id", $booking->id)->first();
        $user->date = request()->input('date');
        $user->start_time = request()->input('start_time');
        $user->end_time = request()->input('end_time');
        $user->slot = request()->input('slot');
        $user->display = request()->input('display');
        $user->real = request()->input('real');
        $user->price = request()->input('price');
        $user->state = request()->input('state');
        $user->save();
        return redirect()->back()->with("success", "Update Successful!");
    }
    public function liveEdit(PreBooking $booking)
    {
        return view("booking.liveEdit", compact("booking"));
    }
    public function liveUpdate(PreBooking $booking)
    {
        $user = PreBooking::where("id", $booking->id)->first();
        $user->display = request()->input('display');
        $user->save();
        return redirect()->back()->with("success", "Update Successful!");
    }
    public function prevEdit(PreBooking $booking)
    {
        return view("booking.prevEdit", compact("booking"));
    }

    public function destroy(PreBooking $booking)
    {
        $booking = PreBooking::where("id", $booking->id)->delete();
        return redirect()->back()->with("delete", "Booking Deleted!");
    }
    public function showBooking(PreBooking $booking)
    {
        return view("booking.booking", compact("booking"));
    }
}
