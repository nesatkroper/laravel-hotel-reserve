<?php

namespace App\Http\Controllers;

use App\Models\BankNote;
use Illuminate\Http\Request;

class BankNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $notes = BankNote::with([
                'openshifts',
                'closeshifts'
            ])
                ->orderBy('bank_note_id', 'desc')
                ->get();

            if ($notes != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $notes
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
            $notes = BankNote::create(
                [
                    'khmer_100' => $request->khmer_100,
                    'khmer_500' => $request->khmer_500,
                    'khmer_1K' => $request->khmer_1K,
                    'khmer_2K' => $request->khmer_2K,
                    'khmer_5K' => $request->khmer_5K,
                    'khmer_10K' => $request->khmer_10K,
                    'khmer_15K' => $request->khmer_15K,
                    'khmer_20K' => $request->khmer_20K,
                    'khmer_30K' => $request->khmer_30K,
                    'khmer_50K' => $request->khmer_50K,
                    'khmer_100K' => $request->khmer_100K,
                    'khmer_200K' => $request->khmer_200K,
                    'us_1' => $request->us_1,
                    'us_5' => $request->us_5,
                    'us_10' => $request->us_10,
                    'us_50' => $request->us_50,
                    'us_100' => $request->us_100,
                ]
            );

            if ($notes)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $notes
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
    public function show(BankNote $bankNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankNote $bankNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankNote $bankNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankNote $bankNote)
    {
        //
    }
}
