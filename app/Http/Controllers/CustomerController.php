<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $customers = Customer::with([
                'reservations',
                'auth'
            ])
                ->where("account_status", '=', 'available')
                ->get();

            if ($customers != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $customers
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
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = 'customer' .  time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/customer'), $filename);
                $request->merge(
                    ['picture' => $filename]
                );
            }

            $customers = Customer::create(
                [
                    'auth_id' => $request->auth_id,
                    'account_status' => $request->account_status,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'picture' => $request->picture,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'status' => $request->status,
                ]
            );

            if (isset($customers))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $customers
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
    public function show(Customer $customer)
    {
        //
        try {
            $customers = Customer::with([
                'reservations',
                'auth'
            ])
                ->where("account_status", '=', 'available')
                ->findOrFail($customer->customer_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $customers
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
    public function update(Request $request, Customer $customer)
    {
        //
        try {
            $customers = Customer::findOrFail($customer->customer_id);

            $picture = $customers->picture;
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = 'customer' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/customer'), $filename);
                $picture = $filename;
            }
            $customers->update(
                [
                    'auth_id' => $request->auth_id,
                    'account_status' => $request->account_status,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'picture' => $picture,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'status' => $request->status,
                ]
            );

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Updated Successfully',
                    'data' => $customers
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
    public function destroy(Customer $customer)
    {
        //
        try {
            $customers = Customer::findOrFail($customer->room_picture_id);
            $customers->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Deleted Successfully',
                    'data' => $customers
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
