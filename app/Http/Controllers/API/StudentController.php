<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
        ]);

        $student = Student::create($validated);
        return response()->json(['message' => 'Etudiant crée avec succès', 'student' => $student], 201);
    }

    public function show(Student $student)
    {
        return $student;
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'birth_date' => 'sometimes|required|date',
        ]);

        $student->update($validated);

        return response()->json(['message' => 'Etudiant mis à jour avec succès', 'student' => $student]);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(['message' => 'Etudiant supprimé avec succès'], 204);
    }
}