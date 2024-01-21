<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;
use Illuminate\Support\Str;

class CommunityController extends Controller
{

    public function index()
    {
        $organizations = Organization::all();
        return view('community.index', compact('organizations'));
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
    private function sanitizerTableName($name)
    {
        return Str::snake($name);
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        // dd($User);
        $tableName = "community_" . $this->sanitizerTableName($request->communityName);
        $questionTable = "question_" . $this->sanitizerTableName($request->communityName);
        $answerTable = "answer_" . $this->sanitizerTableName($request->communityName);

        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('communityName');
            $table->timestamps();
        });

        if (!Schema::hasTable('users_orgs')) {
            Schema::create('users_orgs', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('user_id');
                $table->string('org_id');
                // $table->bigInteger('userGoogle_id');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable($questionTable)) {
            Schema::create($questionTable, function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('user_id');
                $table->string('title');
                $table->longText('description');
                $table->timestamps();
            });
            session([
                'questionTable' => $questionTable,
            ]);
        }
        if (!Schema::hasTable($answerTable)) {
            Schema::create($answerTable, function (Blueprint $table) use ($questionTable) {
                $table->id();
                $table->unsignedInteger('user_id');
                $table->string('org_id');
                $table->unsignedBigInteger('question_id'); // Add this line
                $table->longText('answer');
                $table->foreign('question_id')->references('id')->on($questionTable);
                $table->timestamps();
            });
        }

        DB::table($tableName)->insert([
            'communityName' => $request->communityName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users_orgs')->insert([
            'user_id' => $user->id,
            'org_id' => $request->communityName,
            // 'userGoogle_id'=>$user->googleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // DB::table($questionTable)->insert([
        //     'user_id' => $user->id,
        //     'org_id' => $request->organizationName,
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table($answerTable)->insert([
        //     'user_id' => $user->id,
        //     'org_id' => $randomNumber,
        //     'answer' => $request->answer,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        return redirect(route('dashboard.index'))->with('success', 'Community created successfully');
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
