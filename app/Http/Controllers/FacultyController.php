<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Faculty::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Faculty Create Form';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $faculty = Faculty::create($request->all());

        return response()->json(['message' => 'Faculty created successfully', 'faculty' => $faculty]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        return $faculty->load(['department', 'role']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return 'Faculty Edit Form';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $faculty->update($request->all());

        return response()->json(['message' => 'Faculty updated successfully', 'faculty' => $faculty]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return response()->json(['message' => 'Faculty deleted successfully']);
    }
}
