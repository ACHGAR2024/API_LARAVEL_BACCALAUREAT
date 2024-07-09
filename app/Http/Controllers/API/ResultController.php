<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        return Result::with(['student', 'exam'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam_id' => 'required|exists:exams,id',
            'score' => 'required|numeric|min:0|max:20',
        ]);

        $result = Result::create($validated);
        return response()->json(['message' => 'Résultat créé avec succès', 'result' => $result]);
    }

    public function show(Result $result)
    {
        return $result->load(['student', 'exam']);
    }

    public function update(Request $request, Result $result)
    {
        $validated = $request->validate([
            'student_id' => 'sometimes|required|exists:students,id',
            'exam_id' => 'sometimes|required|exists:exams,id',
            'score' => 'sometimes|required|numeric|min:0|max:20',
        ]);

        $result->update($validated);

        return response()->json(['message' => 'Résultat modifié avec succès', 'result' => $result]);
    }

    public function destroy(Result $result)
    {
        $result->delete();

        return response()->json(['message' => 'Resultat supprimé avec succès']);
    }
}