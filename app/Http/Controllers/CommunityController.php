<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;
use App\Models\UserCommunity;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CommunityController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $communities = UserCommunity::where('created_user_id', $user->id)->get();
        if(!$communities){
            return view('community.index');
        }
        return view('community.index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('community.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $user = auth()->user();
        $community = new UserCommunity();
        $community->created_user_id = $user->id;
        $community->communityName = $request->communityName;
        $community->save();
        return redirect(route('community.index'))->with('success', 'Community created successfully');
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error in creating community');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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
    {;
    }
}
