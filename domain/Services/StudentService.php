<?php
namespace domain\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentService{
    public function getAllStudents()
    {
        return Student::all()->map(function ($student) {
            return [
                'id' => $student->id,
                'name' => $student->name,
                'image' => asset('storage/' . $student->image),
                'age' => $student->age,
                'status' => $student->status,
            ];
        });
    }

    public function createStudent($data)
    {
        $image = $data['image']->store('students', 'public');

        return Student::create([
            'name' => $data['name'],
            'image' => $image,
            'age' => $data['age'],
            'status' => $data['status'],
        ]);
    }

    public function updateStudent($student, $data)
    {
        $image = $student->image;

        if ($data['image']) {
            $oldImagePath = 'public/' . $student->image;
            $image = $data['image']->store('students', 'public');
            Storage::delete($oldImagePath);
        }

        $student->update([
            'name' => $data['name'],
            'image' => $image,
            'age' => $data['age'],
            'status' => $data['status'],
        ]);

        return $student;
    }

    public function deleteStudent($student)
    {
        Storage::delete('public/' . $student->image);
        $student->delete();
    }
}
