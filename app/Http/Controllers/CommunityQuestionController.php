<?php

namespace App\Http\Controllers;

use App\Models\CommunityAnswer;
use App\Models\CommunityQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommunityQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($community_id)
    {
        return view('communityQuestion.create', compact('community_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'community_id' => 'required',
                'community_question_title' => 'required',
                'community_question_description' => 'required',
            ]);

            // Add the logged-in user's ID to the data
            $data['user_id'] = Auth::id();

            CommunityQuestion::create($data);
            return redirect()->route('joinedCommunity.index')->with('success', 'Question has been added successfully!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('joinedCommunity.index')->with('error', 'Error while adding question!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $communityQuestion = CommunityQuestion::findOrFail($id);
        $communityAnswers = CommunityAnswer::where('community_question_id', $id)->get();
        return view('communityQuestion.show', compact('communityQuestion', 'communityAnswers'));
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
