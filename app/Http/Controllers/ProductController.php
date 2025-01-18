<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $products = Product::with('categories')
                ->where('status', '=', 'true')
                ->orderBy('product_id', 'desc')
                ->get();

            if ($products != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $products
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
            $filename = null;
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = 'product' .  time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/product'), $filename);
            }

            $products = Product::create(
                [
                    'product_name' => $request->product_name,
                    'product_code' => 'PROD-' . sprintf('%03d', $request->product_code),
                    'product_category_id' => $request->product_category_id,
                    'picture' => $filename,
                    'price' => $request->price,
                    'discount_rate' => $request->discount_rate,
                    'status' => $request->status,
                ]
            );

            if ($products)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $products
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
    public function show(Product $product)
    {
        //
        try {
            $products = Product::with('categories')
                ->where('status', 'true')
                ->findOrFail($product->product_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $products
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
    public function update(Request $request, Product $product)
    {
        //
        try {
            $products = Product::findOrFail($product->product_id);
            $picture = $products->picture;
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = 'product' .  time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/product'), $filename);
                $request->merge(
                    [
                        'picture' => $filename
                    ]
                );
            }

            $products->update(
                [
                    'product_name' => $request->product_name,
                    'product_code' => 'PROD-' . sprintf('%03d', $request->product_code),
                    'product_category_id' => $request->product_category_id,
                    'picture' => $request->picture,
                    'price' => $request->price,
                    'discount_rate' => $request->discount_rate,
                    'status' => $request->status,
                ]
            );

            if ($products)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $products
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
    public function destroy(Product $product)
    {
        //
        try {
            $products = Product::findOrFail($product->product_id);
            $products->delete();

            if ($products)
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Deleted Successfully',
                        'data' => $products
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
