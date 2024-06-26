<?php

namespace App\Http\Controllers;

use App\Models\JoinedUser;
use App\Models\User;
use App\Models\UserCommunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $users = User::where('id', $userId)->get();
        
        $userCommunities = UserCommunity::where('created_user_id', $userId)->pluck('id');
        
        $joinedUsers = JoinedUser::whereIn('user_community_id', $userCommunities)->get();
        
        return view('dashboard.index', compact('users','joinedUsers'));
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
