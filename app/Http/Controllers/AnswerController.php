<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $questionId = $request->input('question_id');
        $sortOrder = $request->input('sort', 'desc');
        $answers = Answer::where('question_id', $questionId)
            ->orderBy('created_at', $sortOrder)
            ->get();
        $question = Question::find($questionId);
        return view('question.show', compact('answers', 'question'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $answer = Answer::create($data);
        return redirect()->route('question.show', ['question' => $answer->question_id])
            ->with('success', 'Your Answer has been added!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**WW
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
