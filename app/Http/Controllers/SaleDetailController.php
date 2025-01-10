<?php

namespace App\Http\Controllers;

use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $sdetails = SaleDetail::with([
                'sales',
                'products',
            ])
                ->get();

            if ($sdetails != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $sdetails
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
            $sdetails = SaleDetail::create(
                [
                    'sale_id' => $request->sale_id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'amount' => $request->amount,
                ]
            );

            if ($sdetails)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $sdetails
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
    public function show(SaleDetail $saleDetail)
    {
        //
        try {
            $sdetails = SaleDetail::with([
                'sales',
                'products',
            ])
                ->findOrFail($saleDetail->sale_detail_id);

            if ($sdetails != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $sdetails
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaleDetail $saleDetail)
    {
        //
        try {
            $sdetails = $saleDetail::findOrFail($saleDetail->sale_detail_id);
            $sdetails->update(
                [
                    'sale_id' => $request->sale_id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'amount' => $request->amount,
                ]
            );

            if ($sdetails)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $sdetails
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
    public function destroy(SaleDetail $saleDetail)
    {
        //
        try {
            $sdetails = $saleDetail::findOrFail($saleDetail->sale_detail_id);
            $sdetails->delete();

            if ($sdetails)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $sdetails
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
