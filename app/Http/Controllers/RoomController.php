<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function count()
    {
        $count = Room::count();

        if ($count > 0)
            return response()->json(['count' => $count, 'status' => true]);
        else return response()->json(['count' => 0, 'status' => false]);
    }

    public function index()
    {
        //
        try {
            $rooms = Room::with([
                'room_pictures',
                'reservations'
            ])
                ->orderBy('room_id', 'desc')
                ->get();

            if ($rooms != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $rooms
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
            $rooms = Room::create(
                [
                    'room_type' => $request->room_type,
                    'room_name' => 'ROOM-' . sprintf('%03d', $request->room_name),
                    'price' => $request->price,
                    'is_ac' => $request->is_ac,
                    'capacity' => $request->capacity,
                    'size' => $request->size,
                    'discount_rate' => $request->discount_rate,
                    'is_booked' => $request->is_booked,
                    'status' => $request->status,
                ]
            );

            if (isset($rooms))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $rooms
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
    public function show(Room $room)
    {
        //
        try {
            $rooms = Room::with([
                'room_pictures',
                'reservations'
            ])
                ->findOrFail($room->room_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $rooms
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
    public function update(Request $request, Room $room)
    {
        //
        try {
            $rooms = Room::findOrFail($room->room_id);
            $rooms->update(
                [
                    'room_type' => $request->room_type,
                    'room_name' => 'ROOM-' . sprintf('%03d', $request->room_name),
                    'price' => $request->price,
                    'is_ac' => $request->is_ac,
                    'capacity' => $request->capacity,
                    'size' => $request->size,
                    'discount_rate' => $request->discount_rate,
                    'is_booked' => $request->is_booked,
                    'status' => $request->status,
                ]
            );

            if (isset($rooms))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $rooms
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
                ],
                400
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
        try {
            $rooms = Room::findOrFail($room->room_id);
            $rooms->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Deleted Successfully',
                    'data' => $rooms
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