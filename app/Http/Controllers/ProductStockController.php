<?php

namespace App\Http\Controllers;

use App\Models\ProductStock;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $stocks = ProductStock::with([
                'products',
                'suppliers'
            ])
                ->get();

            if ($stocks != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $stocks
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
            $stock = ProductStock::create(
                [
                    'product_id' => $request->product_id,
                    'supplier_id' => $request->supplier_id,
                    'inv_number' => $request->inv_number,
                    'product_add' => $request->product_add,
                    'add_price' => $request->add_price,
                    'add_date' => $request->add_date,
                    'memo' => $request->memo,
                ]
            );

            if ($stock)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $stock
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
    public function show(ProductStock $productStock)
    {
        //
        try {
            $stocks = ProductStock::with([
                'products',
                'suppliers'
            ])
                ->findOrFail($productStock->product_stock_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $stocks
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
    public function update(Request $request, ProductStock $productStock)
    {
        //
        try {
            $stock = ProductStock::findOrFail($productStock->product_stock_id);
            $stock->update(
                [
                    'product_id' => $request->product_id,
                    'supplier_id' => $request->supplier_id,
                    'inv_number' => $request->inv_number,
                    'product_add' => $request->product_add,
                    'add_price' => $request->add_price,
                    'add_date' => $request->add_date,
                    'memo' => $request->memo,
                ]
            );

            if ($stock)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Update Successfully',
                        'data' => $stock
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
    public function destroy(ProductStock $productStock)
    {
        //
        try {
            $stocks = ProductStock::findOrFail($productStock->product_stock_id);
            $stocks->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Deleted Successfully',
                    'data' => $stocks
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
