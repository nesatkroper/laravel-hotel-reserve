<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $employees = Employee::with([
                'reservations',
                'auth',
                'positions',
                'departments'
            ])
                ->where("account_status", '=', 'available')
                ->get();

            if ($employees != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $employees
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
                $filename = 'employee' .  time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/employee'), $filename);
            }

            $employees = Employee::create(
                [
                    'auth_id' => $request->auth_id,
                    'account_status' => $request->account_status,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'picture' => $filename,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'position' => $request->position,
                    'department' => $request->department,
                    'salary' => $request->salary,
                    'hired_date' => $request->hired_date,
                ]
            );

            if (isset($employees))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $employees
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
    public function show(Employee $employee)
    {
        //
        try {
            $employees = Employee::with([
                'reservations',
                'auth'
            ])
                ->where("account_status", '=', 'available')
                ->findOrFail($employee->employee_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $employees
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
    public function update(Request $request, Employee $employee)
    {
        //
        try {
            $employees = Employee::findOrFail($employee->employee_id);

            $picture = $employees->picture;
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = 'employee' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/employee'), $filename);
                $picture = $filename;
            }

            $employees->update(
                [
                    'auth_id' => $request->auth_id,
                    'account_status' => $request->account_status,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'picture' => $picture,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'status' => $request->status,
                    'position' => $request->position,
                    'department' => $request->department,
                    'salary' => $request->salary,
                    'hired_date' => $request->hired_date,
                ]
            );

            if (isset($employees))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated Successfully',
                        'data' => $employees
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
    public function destroy(Employee $employee)
    {
        //
        try {
            $employees = Employee::findOrFail($employee->employee_id);
            $employees->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Deleted Successfully',
                    'data' => $employees
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
