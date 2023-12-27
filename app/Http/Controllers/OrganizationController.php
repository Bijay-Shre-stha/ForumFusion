<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;

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
    private function getRandomNumber()
    {
        return random_int(0, 9999);
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        // dd($User);
        do {
            $randomNumber = $this->getRandomNumber();
            $tableName = "organizations_" . $randomNumber;
            $forumName = "forum_" . $randomNumber;
        } while (Schema::hasTable($tableName));

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
                $table->unsignedInteger('org_id');
                // $table->bigInteger('userGoogle_id');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable($forumName)){
            Schema::create($forumName, function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('user_id');
                $table->unsignedInteger('org_id');
                $table->string('Question');
                $table->string('Answer');
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
            'org_id' => $randomNumber,
            // 'userGoogle_id'=>$user->googleId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return ("welcome");
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
