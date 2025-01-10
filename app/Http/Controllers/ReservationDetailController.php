<?php

namespace App\Http\Controllers;

use App\Models\ReservationDetail;
use Illuminate\Http\Request;

class ReservationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $rdetails = ReservationDetail::with([
                'rooms',
                'reservations',
                'employees',
                'customers'
            ])
                ->get();

            if ($rdetails != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $rdetails
                    ]
                );

            else
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'No data'
                    ]
                );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                400
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $rdetails = ReservationDetail::create(
                [
                    'reservation_id' => $request->reservation_id,
                    'room_id' => $request->room_id,
                    'employee_id' => $request->employee_id,
                    'customer_id' => $request->customer_id,
                ]
            );

            if (isset($rdetails))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $rdetails
                    ]
                );

            else
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'failed'
                    ]
                );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ReservationDetail $reservationDetail)
    {
        //
        try {
            $rdetails = ReservationDetail::with([
                'rooms',
                'reservations',
                'employees',
                'customers'
            ])
                ->findOrFail($reservationDetail->reservation_detail_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $rdetails
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                400
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReservationDetail $reservationDetail)
    {
        //
        try {
            $rdetails = ReservationDetail::findOrFail($reservationDetail->reservation_detail_id);
            $rdetails->update(
                [
                    'reservation_id' => $request->reservation_id,
                    'room_id' => $request->room_id,
                    'employee_id' => $request->employee_id,
                    'customer_id' => $request->customer_id,
                ]
            );

            if ($rdetails)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $rdetails
                    ]
                );

            else
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'failed'
                    ]
                );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReservationDetail $reservationDetail)
    {
        //
        try {
            $rdetails = ReservationDetail::findOrFail($reservationDetail->reservation_detail_id);
            $rdetails->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Deleted Successfully',
                    'data' => $rdetails
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }
}
