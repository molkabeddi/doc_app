<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index($id,$status)

    {
        $bookings=booking::where('user_id',$id)->where('status',$status)->get();
        return response()->json(["data"=>$bookings],200);
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
    public function update_status(Request $request,$id)
    {
        $booking = booking::find($id);
        $status=$booking->status;
        $booking->status=$request->status;
        $booking->save();
        return response()->json([
            'message' => 'Appointement status has been changed from '.$status .' to '.$request->status
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update_booking(Request $request,  $id)
    {
        $booking = booking::find($id);

        $booking->date=$request->date;
        $booking->doctor_id=$request->doctor_id;
        $booking->save();
        return response()->json([
            'message' => 'Appointement hasn been updated'
        ], 200);
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
                'message' => 'Appointement not found'
            ], 201);
        }
        $booking->delete();
        return response()->json([
            'message' => 'Appointement has been deleted'
        ], 200);

    }
}
