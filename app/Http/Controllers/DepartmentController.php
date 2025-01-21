<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $departments = Department::with('positions')
                ->orderBy('department_id', 'desc')
                ->get();

            if ($departments != '[]')
                return response()->json(
                    [
                        'status' => true,
                        'data' => $departments
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
        try {
            $departments = Department::create(
                [
                    'department_name' => $request->department_name,
                    'department_code' => 'DEP-' . sprintf('%03d', $request->department_code),
                    'memo' => $request->memo
                ]
            );

            if (isset($departments))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Created Successfully',
                        'data' => $departments
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
    public function show(Department $department)
    {
        //
        try {
            $departments = Department::with('positions')
                ->findOrFail($department->department_id);

            return response()->json(
                [
                    'status' => true,
                    'data' => $departments
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
    public function update(Request $request, Department $department)
    {
        //
        try {
            $departments = Department::findOrFail($department->department_id);

            $departments->update(
                [
                    'department_name' => $request->department_name,
                    'department_code' => 'DEP-' . sprintf('%03d', $request->department_code),
                    'memo' => $request->memo
                ]
            );

            if (isset($departments))
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Update Successfully',
                        'data' => $departments
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
    public function destroy(Department $department)
    {
        //
        try {
            $departments = Department::findOrFail($department->department_id);
            $departments->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Deleted Successfully',
                    'data' => $departments
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