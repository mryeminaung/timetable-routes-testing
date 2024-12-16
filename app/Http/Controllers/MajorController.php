<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Major::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Major Create Form';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $major = Major::create($request->all());

        return response()->json(['message' => 'Major created successfully', 'major' => $major]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return $major;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return 'Major Edit Form';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        $major->update($request->all());

        return response()->json(['message' => 'Major updated successfully', 'major' => $major]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();

        return response()->json(['message' => 'Major deleted successfully']);
    }
}
