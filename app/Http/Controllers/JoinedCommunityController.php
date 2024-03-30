<?php

namespace App\Http\Controllers;

use App\Models\CommunityQuestion;
use App\Models\JoinedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JoinedCommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $communities = JoinedUser::where('user_id', auth()->user()->id)->get();

        return view('JoinedCommunity.index', compact('communities'));
    }

    public function leaveCommunity($id)
    {
        try {
            $community = JoinedUser::findOrFail($id);
            $community->delete();
            return redirect()->route('joinedCommunity.index')->with('success', 'You have left the community!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('joinedCommunity.index')->with('error', 'Error while leaving the community.');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function createQuestion(string $id)
    {
        return view('communityQuestion.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $joinedUser = JoinedUser::findOrFail($id);

            if (!$joinedUser->userCommunity) {
                // Handle the case where user community is not found
                abort(404);
            }

            $communityQuestions = CommunityQuestion::where('community_id', $joinedUser->user_community_id)->get();
            $community_id = $joinedUser->user_community_id; // Get the community ID

            return view('communityQuestion.index', compact('communityQuestions', 'community_id'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('joinedCommunity.index')->with('error', 'Error while fetching community questions.');
        }
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
