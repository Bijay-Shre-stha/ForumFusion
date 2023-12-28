<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{

    public function index()
    {
        $organizations = Organization::all();
        return view('organization.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organization.create');
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
        $tableName = "organizations_" . $this->sanitizerTableName($request->organizationName);
        $questionTable = "question_" . $this->sanitizerTableName($request->organizationName);
        $answerTable = "answer_" . $this->sanitizerTableName($request->organizationName);

        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('organizationName');
            $table->string('organizationAddress');
            $table->unsignedInteger('organizationPhoneNumber');
            $table->string('organizationEmail');
            $table->unsignedInteger('organizationPanNumber')->nullable();
            $table->unsignedInteger('organizationVatNumber')->nullable();
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
                $table->string('org_id');
                $table->string('title');
                $table->longText('description');
                $table->timestamps();
            });
        }
        if (!Schema::hasTable($answerTable)) {
            Schema::create($answerTable, function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('user_id');
                $table->string('org_id');
                $table->longText('answer');
                $table->timestamps();
            });
        }

        DB::table($tableName)->insert([
            'organizationName' => $request->organizationName,
            'organizationAddress' => $request->organizationAddress,
            'organizationPhoneNumber' => $request->organizationPhoneNumber,
            'organizationEmail' => $request->organizationEmail,
            'organizationPanNumber' => $request->organizationPanNumber,
            'organizationVatNumber' => $request->organizationVatNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users_orgs')->insert([
            'user_id' => $user->id,
            'org_id' => $request->organizationName,
            // 'userGoogle_id'=>$user->googleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // DB::table($questionTable)->insert([
        //     'user_id' => $user->id,
        //     'org_id' => $randomNumber,
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
        return redirect(route('dashboard'))->with('success', 'Organization created successfully');
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
