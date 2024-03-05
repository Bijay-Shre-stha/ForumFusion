<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // $questionTable = $request->session()->get('questionTable');
        // $questions = DB::table($questionTable)->get();

        $user_id = auth()->user()->id;
        $questions = Question::where('user_id', $user_id)->get();
        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $questionTable = $request->session()->get('questionTable');
        // return view("question.create", compact('questionTable'));

        return view("question.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        $question = $request->validated();
        $question['user_id'] = auth()->user()->id;
        Question::create($question);
        return redirect()->route('question.index')->with('success', 'Your question has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $question = Question::findOrFail($id);
        $answers = Answer::where('question_id', $id)->get();
        return view('question.show', compact('question', 'answers'));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('question.index')->with('success', 'Your question has been deleted!');
    }
}
