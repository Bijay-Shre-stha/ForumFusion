<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $questionTable = $request->session()->get('questionTable');
        $questions = DB::table($questionTable)->get();
        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $questionTable = $request->session()->get('questionTable');
        return view("question.create", compact('questionTable'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $questionTable = session('questionTable');

        // Create the 'questions' table if it doesn't exist
        $createTableQuery = "
            CREATE TABLE IF NOT EXISTS $questionTable (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
                title VARCHAR(255),
                description TEXT,
                `created_at` timestamp NULL DEFAULT NULL,
                `updated_at` timestamp NULL DEFAULT NULL
            )
        ";
        DB::statement($createTableQuery);

        // Insert data into the 'questions' table
        $insertDataQuery = "
            INSERT INTO $questionTable (user_id, title, description, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?)
        ";
        DB::insert($insertDataQuery, [
            $user->id,
            $request->title,
            $request->description,
            now(),
            now(),
        ]);
        // Redirect to the question list with success message
        return redirect()->route('question.index')->with('success', 'Question created successfully.');
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