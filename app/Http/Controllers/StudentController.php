<?php

namespace App\Http\Controllers;

use App\Models\Student;
use domain\Facade\StudentFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Students/index',
            ['students' => StudentFacade::getAllStudents(),]);
    }

    public function create()
    {
        return Inertia::render('Students/create');
    }

    public function store(Request $request)
    {
        StudentFacade::createStudent($request->all());
        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return Inertia::render('Students/edit',
            ['student' => $student, 'image' => asset('storage/' . $student->image),]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        StudentFacade::updateStudent($student, $request->all());
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        StudentFacade::deleteStudent($student);
        return redirect()->route('students.index');
    }
}
