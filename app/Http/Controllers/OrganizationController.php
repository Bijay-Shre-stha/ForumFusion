<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

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
    public function store(Request $request)
    {
        $organization = new Organization();
        $organization->organizationName = $request->organizationName;
        $organization->organizationAddress = $request->organizationAddress;
        $organization->organizationPhoneNumber = $request->organizationPhoneNumber;
        $organization->organizationEmail = $request->organizationEmail;
        $organization->organizationPanNumber = $request->organizationPanNumber;
        $organization->organizationVatNumber = $request->organizationVatNumber;
        $organization->save();
        return redirect()->route('organization.index');
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
        $organization = Organization::find($id);
        return view('organization.edit', compact('organization'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $organization = Organization::find($id);
        $organization->organizationName = $request->organizationName;
        $organization->organizationAddress = $request->organizationAddress;
        $organization->organizationPhoneNumber = $request->organizationPhoneNumber;
        $organization->organizationEmail = $request->organizationEmail;
        $organization->organizationPanNumber = $request->organizationPanNumber;
        $organization->organizationVatNumber = $request->organizationVatNumber;
        $organization->save();
        return redirect()->route('organization.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organization = Organization::find($id);
        $organization->delete();
        return redirect()->route('organization.index');

    }
}

