<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $pcategories = ProductCategory::with('products')
                ->get();

            if ($pcategories != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $pcategories
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
            $pcategories = ProductCategory::create(
                [
                    'category_name' => $request->category_name,
                    'category_code' => 'CATE-' . sprintf('%03d',  $request->category_code),
                    'memo' => $request->memo,
                ]
            );

            if ($pcategories)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $pcategories
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
    public function show(ProductCategory $productCategory)
    {
        //
        try {
            $pcategories = ProductCategory::with('products')
                ->find($productCategory->product_category_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $pcategories
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
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
        try {
            $pcategory = ProductCategory::findOrFail($productCategory->product_category_id);
            $pcategory->update(
                [
                    'category_name' => $request->category_name,
                    'category_code' => 'CATE-' . sprintf('%03d',  $request->category_code),
                    'memo' => $request->memo,
                ]
            );

            if ($pcategory)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $pcategory
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
    public function destroy(ProductCategory $productCategory)
    {
        //
        try {
            $pcategory = ProductCategory::findOrFail($productCategory->product_category_id);
            $pcategory->delete();

            if ($pcategory)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Delete Successfully',
                        'data' => $pcategory
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
}
