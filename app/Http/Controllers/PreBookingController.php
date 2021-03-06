<?php

namespace App\Http\Controllers;

use App\Models\PreBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ClientPreBookingExport;
use Maatwebsite\Excel\Facades\Excel;


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
            'end_time' => 'required|date_format:H:i|after:start_time',
            'slot' => 'required',
            'display' => 'required|integer',
            'real' => 'required|integer|lte:display',
            'link' => 'required|url',
            'city' => 'required',
            'price' => 'integer',
            'price_2month' => 'integer',
            'price_3month' => 'integer',
            'title' => 'required|min:3'
        ]);
        $booking = new PreBooking($validatedRequest);
        $booking->city = implode(",", $validatedRequest['city']);
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
        $user->price_2month = request()->input('price_2month');
        $user->price_3month = request()->input('price_3month');
        $user->city = implode(",", request()->input('city'));
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
        $user->price = request()->input('price');
        $user->price_2month = request()->input('price_2month');
        $user->price_3month = request()->input('price_3month');
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
    // public function export()
    // {
    //     return Excel::download(new ClientPreBookingExport, 'clients.xlsx');
    // }
}
