<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('room.index', [
            'rooms' => ClassRoom::simplePaginate(10),
            'noOfRoom' => ClassRoom::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'ClassRoom Create Form';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classroom = ClassRoom::create($request->all());

        return response()->json(['message' => 'ClassRoom Created Successfully', 'classRoom' => $classroom]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classroom)
    {
        return $classroom;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classroom)
    {
        return 'ClassRoom Edit Form';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classroom)
    {
        $classroom->update($request->all());

        return response()->json(['message' => 'ClassRoom updated successfully', 'classRoom' => $classroom]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassRoom $classroom)
    {
        $classroom->delete();

        return response()->json(['message' => 'ClassRoom deleted successfully']);
    }
}
