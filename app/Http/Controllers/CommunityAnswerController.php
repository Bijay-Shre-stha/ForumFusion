<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommunityAnswerRequest;
use App\Models\CommunityAnswer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommunityAnswerController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityAnswerRequest $request)
    {
        //
        try{
        $data = $request->validated();
        CommunityAnswer::create($data);
        return redirect()->back()->with('success', 'Answer has been added successfully!');
        }
        catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error while adding answer!');
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
        $data = CommunityAnswer::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Answer has been deleted successfully!');
    }
}
