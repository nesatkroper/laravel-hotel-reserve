<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $positions = Position::with('departments')
                ->get();

            if ($positions != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $positions
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
            $positions = Position::create(
                [
                    'department_id' => $request->department_id,
                    'position_name' => $request->position_name,
                    'position_code' => 'POS-' . sprintf('%03d', $request->position_code),
                    'memo' => $request->memo
                ]
            );

            if (isset($positions))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $positions
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
    public function show(Position $position)
    {
        //
        try {
            $positions = Position::with('departments')
                ->findOrFail($position->position_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $positions
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
    public function update(Request $request, Position $position)
    {
        //
        try {
            $positions = Position::findOrFail($position->position_id);

            $positions->update(
                [
                    'position_name' => $request->position_name,
                    'position_code' => 'POS-' . sprintf('%03d', $request->position_code),
                    'memo' => $request->memo
                ]
            );

            if (isset($positions))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Update Successfully',
                        'data' => $positions
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
    public function destroy(Position $position)
    {
        //
        try {
            $positions = Position::findOrFail($position->position_id);
            $positions->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Deleted Successfully',
                    'data' => $positions
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
