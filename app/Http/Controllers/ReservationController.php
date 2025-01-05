<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {

            $reserve = Reservation::all();

            if (!isset($reserve))
                return response()->json([
                    'status' => true,
                    'data' => $reserve
                ]);

            else
                return response()->json([
                    'status' => true,
                    'message' => "No data."
                ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $store =   Reservation::create([
                'room_id' => $request->room_id,
                'customer_id' => $request->customer_id,
                'checkin_date' => $request->checkin_date,
                'checkout_date' => $request->checkout_date,
                'is_checkin' => $request->is_checkin,
                'is_checkout' => $request->is_checkout,
                'reservation_type' => $request->reservation_type,
                'adults' => $request->adults,
                'children' => $request->children,
                'payment_status' => $request->payment_status,
                'payment_method' => $request->payment_method,
                'memo' => $request->memo,
                'is_hidden' => $request->is_hidden
            ]);

            return response()->json([
                'status' => true,
                'message' => "successfully",
                'data' => $store
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
