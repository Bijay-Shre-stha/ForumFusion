<?php

namespace App\Http\Controllers;

use App\Models\CommunityQuestion;
use App\Models\JoinedUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommunityQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get users joined communities question
        $communities = JoinedUser::where('user_id', auth()->user()->id)->get();
        $communityQuestions = [];
        foreach ($communities as $community) {
            $communityQuestions[] = $community->communityQuestions;
        }
        $communityQuestions = collect($communityQuestions)->flatten();
        
        return view('communityQuestion.index', compact('communityQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $community  = JoinedUser::where('user_id', auth()->user()->id)->get();
        $community = $community->pluck('user_community_id')->first();
        $user_id = auth()->user()->id;
        return view('communityQuestion.create', compact('community', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $data = $request->validate([
                'community_id' => 'required',
                'user_id' => 'required',
                'community_question_title' => 'required',
                'community_question_description' => 'required',
            ]);
            CommunityQuestion::create($data);
            return redirect()->route('communityQuestion.index')->with('success', 'Question has been added successfully!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('communityQuestion.index')->with('error', 'Error while adding question!');
        }
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
