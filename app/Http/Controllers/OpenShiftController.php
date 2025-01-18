<?php

namespace App\Http\Controllers;

use App\Models\OpenShift;
use Illuminate\Http\Request;

class OpenShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //
        try {
            $opens = OpenShift::with([
                'employeese',
                'banknotes'
            ])
                ->orderBy('open_shift_id', 'desc')
                ->get();

            if ($opens != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $opens
                    ]
                );

            else
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'No data',
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
        date_default_timezone_set("Asia/Phnom_Penh");
        try {
            $opens = OpenShift::create(
                [
                    'employee_id' => $request->employee_id,
                    'bank_note_id' => $request->bank_note_id,
                    'open_khmer_riel' => $request->open_khmer_riel,
                    'open_us_dollar' => $request->open_us_dollar,
                    'shift_code' => 'SHIFT-' . sprintf('%04d',  $request->shift_code),
                    'open_date' => date("Y-m-d"),
                    'open_time' => date("H:i:s")
                ]
            );

            if ($opens)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $opens
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
    public function show(OpenShift $openShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OpenShift $openShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OpenShift $openShift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OpenShift $openShift)
    {
        //
    }
}
