<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index($id)

    {
        $bookings=booking::where('id',$id)->get();
        return response()->json(["data"=>$bookings],200);
    }

    public function booking_by_date(Request $request,$id)
    {

    }

    public function add_booking (Request $request)
    {
        $booking = booking::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'status' => "upcoming",
            'doctor_id' => $request->doctor_id,
        ]);
        return response()->json(["message"=>"Appointement has been added"],200);
    }
    public function cancel_booking($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update_booking(Request $request,  $booking)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking=booking::find($id);

        if (!$booking) {
            return response()->json([
                'message' => 'Booking not found'
            ], 201);
        }
        $booking->delete();
        return response()->json([
            'message' => 'Booking has been deleted'
        ], 200);

    }
}
