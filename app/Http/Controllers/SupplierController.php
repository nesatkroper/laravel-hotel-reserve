<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $suppliers = Supplier::with('stocks')
                ->get();

            if ($suppliers != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $suppliers
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
            $supplier = Supplier::create(
                [
                    'supplier_name' => $request->supplier_name,
                    'company_name' => $request->company_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                ]
            );

            if ($supplier)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $supplier
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
    public function show(Supplier $supplier)
    {
        //
        try {
            $suppliers = Supplier::with('stocks')
                ->findOrFail($supplier->supplier_id);

            if ($suppliers)
                return response()->json(
                    [
                        'status' => true,
                        'data' => $suppliers
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
    public function update(Request $request, Supplier $supplier)
    {
        //
        try {
            $supplier = Supplier::findOrFail($supplier->supplier_id);
            $supplier->update(
                [
                    'supplier_name' => $request->supplier_name,
                    'company_name' => $request->company_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                ]
            );

            if ($supplier)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $supplier
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
    public function destroy(Supplier $supplier)
    {
        //
        try {
            $supplier = Supplier::findOrFail($supplier->supplier_id);
            $supplier->delete();

            if ($supplier)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $supplier
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
