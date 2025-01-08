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
        return view('department.index', [
            'departments' => Department::simplePaginate(10),
            'noOfDepartment' => Department::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Department Create Form';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $department = Department::create($request->all());

        return response()->json(['message' => 'Department created successfully', 'department' => $department]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return $department;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return 'Department Edit Form';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $department->update($request->all());

        return response()->json(['message' => 'Department updated successfully', 'department' => $department]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return response()->json(['message' => 'Department deleted successfully']);
    }
}
