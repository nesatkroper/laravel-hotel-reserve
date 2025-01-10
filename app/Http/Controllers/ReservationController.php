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
            $reserve = Reservation::with([
                'rooms',
                'customers',
                'employees'
            ])
                ->get();

            if ($reserve != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $reserve
                    ]
                );

            else
                return response()->json(
                    [
                        'status' => true,
                        'message' => "No data."
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            // $validate = $request->validate([
            //     'room_id' => 'required|exists:rooms,room_id',
            //     'employee_id' => 'required|exists:employees,employee_id',
            //     'customer_id' => 'required|exists:customers,customer_id',
            //     'checkin_date' => 'required|date',
            //     'checkout_date' => 'required|date|after:checkin_date',
            //     'is_checkin' => 'required|boolean',
            //     'is_checkout' => 'required|boolean',
            //     'reservation_type' => 'required|string',
            //     'adults' => 'required|integer|min:1',
            //     'children' => 'required|integer|min:0',
            //     'payment_status' => 'required|string',
            //     'payment_method' => 'required|string',
            //     'memo' => 'nullable|string',
            //     'is_hidden' => 'required|boolean'
            // ]);

            // $reserve =   Reservation::create(
            //     [
            //         'room_id' => $request->room_id,
            //         'employee_id' => $request->employee_id,
            //         'customer_id' => $request->customer_id,
            //         'checkin_date' => $request->checkin_date,
            //         'checkout_date' => $request->checkout_date,
            //         'is_checkin' => $request->is_checkin,
            //         'is_checkout' => $request->is_checkout,
            //         'reservation_type' => $request->reservation_type,
            //         'adults' => $request->adults,
            //         'children' => $request->children,
            //         'payment_status' => $request->payment_status,
            //         'payment_method' => $request->payment_method,
            //         'memo' => $request->memo,
            //         'is_hidden' => $request->is_hidden
            //     ]
            // );

            $reserve =   Reservation::create(
                [
                    'room_id' => $request->room_id,
                    'employee_id' => $request->employee_id,
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
                ]
            );

            if ($reserve)
                return response()->json(
                    [
                        'status' => true,
                        'message' => "Created successfully",
                        'data' => $reserve
                    ]
                );

            else
                return response()->json(
                    [
                        'status' => false,
                        'message' => "failed",
                        'data' => $reserve
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
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
        try {
            $reserve = Reservation::with([
                'rooms',
                'customers',
                'employees'
            ])
                ->findOrFail($reservation->reservation_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $reserve
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
        try {
            $reserve = Reservation::findOrFail($reservation->reservation_id);
            $reserve->update(
                [
                    'room_id' => $request->room_id,
                    'employee_id' => $request->employee_id,
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
                ]
            );

            if ($reserve)
                return response()->json(
                    [
                        'status' => true,
                        'message' => "Updated successfully",
                        'data' => $reserve
                    ]
                );

            else
                return response()->json(
                    [
                        'status' => false,
                        'message' => "failed",
                        'data' => $reserve
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
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
        try {
            $reserve = Reservation::findOrFail($reservation->reservation_id);
            $reserve->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Delete Successfully',
                    'date' => $reserve
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
