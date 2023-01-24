<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function book(Request $request)
    {
        $bookings = Booking::where('gym_type', $request->gym_type)->get();
        $book_full = null;
        $ranges = [];

        $requested_start_time = date('Y-m-d H:i:s', strtotime("$request->date $request->time"));
        $requested_end_time = date('Y-m-d H:i:s', strtotime(Carbon::Parse(date('Y-m-d H:i:s', strtotime("$request->date $request->time")))->addMinutes(29)));

        foreach ($bookings as $booking) {
            $start_timestamp = strtotime($booking->start_at);
            $end_timsetamp = strtotime(Carbon::Parse($booking->start_at)->addMinutes(29));

            $start_readable_timestamp = date('Y-m-d H:i:s', $start_timestamp);
            $end_readable_timestamp = date('Y-m-d H:i:s', $end_timsetamp);

            array_push($ranges, [
                "start" => $start_readable_timestamp,
                "end" => $end_readable_timestamp
            ]);
        }

        foreach ($ranges as $range) {
            // echo "<br>req stt: " . $requested_start_time;
            // echo "<br>rng stt: " . $range['start'];
            // echo "<br>req end: " . $requested_end_time;
            // echo "<br>rng end: " . $range['end'];
            if (strtotime($requested_start_time) >= strtotime($range['start']) && strtotime($requested_start_time) <= strtotime($range['end'])) {
                $book_full = "Sorry this period is already booked";
                // dd("start conflict");
            } elseif (strtotime($requested_end_time) >= strtotime($range['start']) && strtotime($requested_end_time <= $range['end'])) {
                $book_full = "Sorry this period is already booked";
                // dd("end conflict");
            } else {
                // dd("no conflict");
            }
        }

        // check
        if ($book_full == null) {
            $booking = new Booking();
            $booking->requestor = Auth::user()->id;
            $booking->gym_type = $request->gym_type;
            $booking->start_at = $requested_start_time;
            $booking->end_at =  $requested_end_time;
            $booking->save();
            return redirect()->back()->with('book_success', "Gym has been booked!");
        } else {
            return redirect()->back()->with('book_full', $book_full);
        }
    }

    public function index()
    {
        $bookings = Booking::all();
        return view('booking')->with(compact('bookings'));
    }

    public function gym()
    {
        $bookings = Booking::all();
        $data = [];
        foreach ($bookings as $booking) {
            $start_at_readable = date('H:i A d/m/Y', strtotime($booking->start_at));
            $end_at_readable = date('H:i A d/m/Y', strtotime($booking->end_at));

            array_push(
                $data,
                [
                    "id" =>  $booking->id,
                    "name" =>  User::find($booking->requestor)->username,
                    "gym_type" => $booking->gym_type,
                    "username" => User::find($booking->requestor)->username,
                    "start_at" => $booking->start_at,
                    "start_at_readable" => $start_at_readable,
                    "start_hour" => intval(date('H', strtotime($booking->start_at))),
                    "start_minute" => intval(date('i', strtotime($booking->start_at))),
                    "end_at" => $booking->end_at,
                    "end_at_readable" => $end_at_readable,
                    "end_hour" => intval(date('H', strtotime($booking->end_at))),
                    "end_minute" => intval(date('i', strtotime($booking->end_at))),
                ]
            );
        }
        return $data;
    }

    public function gymDate($date)
    {
        $requestDay = date('d', strtotime($date));
        $requestMonth = date('m', strtotime($date));
        $requestYear = date('Y', strtotime($date));

        $bookings = Booking::WhereDay('start_at', $requestDay)->WhereMonth('start_at', $requestMonth)->WhereYear('start_at', $requestYear)->get();

        $data = [];
        foreach ($bookings as $booking) {
            $start_at_readable = date('H:i A d/m/Y', strtotime($booking->start_at));
            $end_at_readable = date('H:i A d/m/Y', strtotime($booking->end_at));

            array_push(
                $data,
                [
                    "id" =>  $booking->id,
                    "name" =>  User::find($booking->requestor)->username,
                    "gym_type" => $booking->gym_type,
                    "username" => User::find($booking->requestor)->username,
                    "start_at" => $booking->start_at,
                    "start_at_readable" => $start_at_readable,
                    "start_hour" => intval(date('H', strtotime($booking->start_at))),
                    "start_minute" => intval(date('i', strtotime($booking->start_at))),
                    "end_at" => $booking->end_at,
                    "end_at_readable" => $end_at_readable,
                    "end_hour" => intval(date('H', strtotime($booking->end_at))),
                    "end_minute" => intval(date('i', strtotime($booking->end_at))),
                ]
            );
        }
        return $data;
    }

    public function appBookGym($gymType, $name, $date, $time)
    {


        $temp_date = substr( date('Y-m-d H:i:s', strtotime("$date")), 0, -9);
        $requested_date = $temp_date . " " . $time . ":00";

        $bookings = Booking::where('gym_type', $gymType)->get();
        $book_full = null;
        $ranges = [];

        $requested_start_time = $requested_date;
        $requested_end_time = date('Y-m-d H:i:s', strtotime(Carbon::Parse($requested_date)->addMinutes(29)));

        foreach ($bookings as $booking) {
            $start_timestamp = strtotime($booking->start_at);
            $end_timsetamp = strtotime(Carbon::Parse($booking->start_at)->addMinutes(29));

            $start_readable_timestamp = date('Y-m-d H:i:s', $start_timestamp);
            $end_readable_timestamp = date('Y-m-d H:i:s', $end_timsetamp);

            array_push($ranges, [
                "start" => $start_readable_timestamp,
                "end" => $end_readable_timestamp
            ]);
        }

        foreach ($ranges as $range) {
            // echo "<br>req stt: " . $requested_start_time;
            // echo "<br>rng stt: " . $range['start'];
            // echo "<br>req end: " . $requested_end_time;
            // echo "<br>rng end: " . $range['end'];
            if (strtotime($requested_start_time) >= strtotime($range['start']) && strtotime($requested_start_time) <= strtotime($range['end'])) {
                $book_full = "Sorry this period is already booked";
                // dd("start conflict");
            } elseif (strtotime($requested_end_time) >= strtotime($range['start']) && strtotime($requested_end_time <= $range['end'])) {
                $book_full = "Sorry this period is already booked";
                // dd("end conflict");
            } else {
                // dd("no conflict");
            }
        }

        // check
        if ($book_full == null) {
            $booking = new Booking();
            $booking->requestor = 1;
            $booking->gym_type = $gymType;
            $booking->start_at = $requested_start_time;
            $booking->end_at =  $requested_end_time;
            $booking->save();
            return 200;
        } else {
            return "booked";
        }


    }
}
