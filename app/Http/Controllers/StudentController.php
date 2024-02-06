<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Students/index',[
            'students'=>Student::all()->map(function ($students){
                return[
                    'id'=>$students->id,
                    'name'=>$students->name,
                    'image' => asset('storage/app/public/' . $students->image),
                    'age'=>$students->age,
                    'status'=>$students->status,];
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
            'status'=>$request->input('status'),
        ]);

        return redirect()->route('students.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
