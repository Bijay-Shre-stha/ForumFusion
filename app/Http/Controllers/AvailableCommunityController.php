<?php

namespace App\Http\Controllers;

use App\Models\UserCommunity;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailableCommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $userId = auth()->id();
        $communities = UserCommunity::where('created_user_id', '!=', $userId)->get();

        return view('availableCommunity.index', compact('communities'));
        }
        catch (Exception $e) {
            return redirect()->route('availableCommunity.index')->with('error', 'Error while fetching communities.');
        }
    }

    public function join(Request $request, string $id)
    {
        try {
            $community = UserCommunity::findOrFail($id);
            $userId = Auth::id();
            $joinedUsers = $community->joinedUsers()->where('user_id', $userId)->first();

            if (!$joinedUsers) {
                $community->joinedUsers()->create(['user_id' => $userId]);
            } else {
                return redirect()->route('availableCommunity.index')->with('error', 'You are already a member of this community.');
            }

            return redirect()->route('availableCommunity.index')->with('success', 'You have successfully joined the community.');
        } catch (Exception $e) {
            return redirect()->route('availableCommunity.index')->with('error', 'Error while joining the community, please login.');
        }
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
        //
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
