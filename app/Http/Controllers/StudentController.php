<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Students/index', [
            'students' => Student::all()->map(function ($student) {
                return [
                    'id' => $student->id,
                    'name' => $student->name,
                    'image' => asset('storage/' . $student->image),
                    'age' => $student->age,
                    'status' => $student->status,
                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Students/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->store('students', 'public');

        Student::create([
            'name' => $request->input('name'),
            'image' => $image,
            'age' => $request->input('age'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // Implement if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return Inertia::render('Students/edit', [
            'student' => $student,
            'image' => asset('storage/' . $student->image),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $image = $student->image;

        if ($request->file('image')) {
            $oldImagePath = 'public/' . $student->image;
            $image = $request->file('image')->store('students', 'public');
            Storage::delete($oldImagePath);
        }

        $student->update([
            'name' => $request->input('name'),
            'image' => $image,
            'age' => $request->input('age'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
       Storage::delete('public/'.$student->image);
       $student->delete();
        return redirect()->route('students.index');
    }
}
