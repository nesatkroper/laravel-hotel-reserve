<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $sales = Sale::with([
                'employees',
                'rooms',
                'customers'
            ])
                ->get();

            if ($sales != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $sales
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
            $sales = Sale::create(
                [
                    'employee_id' => $request->employee_id,
                    'room_id' => $request->room_id,
                    'customer_id' => $request->customer_id,
                    'sale_date' => $request->sale_date,
                    'discount_rate' => $request->discount_rate,
                    'total' => $request->total,
                    'amount' => $request->amount,
                ]
            );

            if ($sales)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $sales
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
    public function show(Sale $sale)
    {
        //
        try {
            $sale = Sale::with([
                'employees',
                'rooms',
                'customers'
            ])
                ->findOrFail($sale->sale_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $sale
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
    public function update(Request $request, Sale $sale)
    {
        //
        try {
            $sales = Sale::findOrFail($sale->sale_id);
            $sales->update(
                [
                    'employee_id' => $request->employee_id,
                    'room_id' => $request->room_id,
                    'customer_id' => $request->customer_id,
                    'sale_date' => $request->sale_date,
                    'discount_rate' => $request->discount_rate,
                    'total' => $request->total,
                    'amount' => $request->amount,
                ]
            );

            if ($sales)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $sales
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
    public function destroy(Sale $sale)
    {
        //
        try {
            $sales = Sale::findOrFail($sale->sale_id);
            $sales->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Deleted Successfully',
                    'data' => $sales
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
