<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        return Exam::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $exam = Exam::create($validated);
        return response()->json(['message' => 'Examen crée avec succès', 'exam' => $exam], 201);
    }

    public function show(Exam $exam)
    {
        return $exam;
    }

    public function update(Request $request, Exam $exam)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'year' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
        ]);

        $exam->update($validated);

        return response()->json(['message' => 'Examen mis à jour avec succès', 'exam' => $exam]);
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();

        return response()->json(['message' => 'Examen supprimé avec succès'], 200);
    }
}