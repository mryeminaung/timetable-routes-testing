<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Exports\FacultiesExport;
use App\Http\Requests\faculty\StoreFacultyRequest;
use App\Http\Requests\faculty\UpdateFacultyRequest;
use App\Imports\FacultiesImport;
use App\Models\Department;
use App\Models\Image;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('faculty.index', [
            'faculties' => Faculty::orderByDesc('id')->simplePaginate(10),
            'noOfFaculty' => Faculty::count()
        ]);
    }

    public function exportExcel()
    {
        return Excel::download(new FacultiesExport, 'faculties.xlsx');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'myFile' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new FacultiesImport, $request->file('myFile'));

        return redirect()->route('faculties.index')->with('status', 'Faculties imported successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();

        return view('faculty.create', [
            'roles' => $roles,
            'departments' => $departments
        ]);
        // return 'Faculty Create Form';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        $data = $request->validated();

        $faculty = Faculty::create($data);

        // handling profile image uploading
        if ($request->hasFile('profilePic')) {
            $file = $request->file('profilePic')->store('faculties', [
                'disk' => 's3',
                'visibility' => 'public'
            ]);

            $url = 'https://special-project-3001.s3.ap-southeast-1.amazonaws.com/' . $file;

            $image = new Image(['url' => $url]);

            $faculty->image()->save($image);

            // Log::info('url =>' . 'https://special-project-3001.s3.ap-southeast-1.amazonaws.com/' . $file);

            // $request->merge(['image' => $image]);
            // return 'Profile Image uploaded successfully';
        }

        return redirect()->route('faculties.index')->with(['message' => 'Faculty created successfully']);
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
        $roles = Role::all();
        $departments = Department::all();

        return view('faculty.edit', [
            'faculty' => $faculty,
            'roles' => $roles,
            'departments' => $departments
        ]);
        // return 'Faculty Edit Form';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        $faculty->update($request->validated());

        return redirect()->route('faculties.index')->with(['message' => 'Faculty updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect()->route('faculties.index')->with(['message' => 'Faculty deleted successfully']);
    }
}
