<?php

namespace App\Http\Controllers;

use App\Models\RoomPicture;
use Illuminate\Http\Request;

class RoomPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $rpicture = RoomPicture::with('rooms')
                ->get();

            if ($rpicture != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $rpicture
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
        $filename = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = 'rooms' .  time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/rooms'), $filename);
        }

        try {
            $rpicture = RoomPicture::create(
                [
                    'room_id' => $request->room_id,
                    'picture_name' => $request->picture_name,
                    'picture' => $filename
                ]
            );

            if (isset($rpicture))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $rpicture
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
            if ($filename) {
                unlink(public_path('images/rooms/' . $filename));
            }

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
    public function show(RoomPicture $roomPicture)
    {
        //
        try {
            $rpicture = RoomPicture::with('rooms')
                ->findOrFail($roomPicture->room_picture_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $rpicture
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
    public function update(Request $request, RoomPicture $roomPicture)
    {
        //


        try {
            $rpicture = RoomPicture::findOrFail($roomPicture->room_picture_id);

            $picture = $rpicture->picture;
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = 'rooms' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/rooms'), $filename);
                $picture = $filename;
            }

            $rpicture->update(
                [
                    'room_id' => $request->room_id,
                    'picture_name' => $request->picture_name,
                    'picture' => $picture
                ]
            );

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Created Successfully',
                    'data' => $rpicture
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
    public function destroy(RoomPicture $roomPicture)
    {
        //
        try {
            $rpicture = RoomPicture::findOrFail($roomPicture->room_picture_id);

            if ($rpicture->picture && file_exists(public_path('images/rooms/' . $rpicture->picture)))
                unlink(public_path('images/rooms/' . $roomPicture->picture));
            $rpicture->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Deleted Successfully',
                    'data' => $rpicture
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
