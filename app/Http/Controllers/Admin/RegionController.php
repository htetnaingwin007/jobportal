<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Http\Requests\RegionRequest;
use App\Http\Requests\UpdateRegionRequest;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $joblocations = Region::orderBy('id', 'DESC')->get();
        return view('admin.joblocations.index',compact('joblocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.joblocations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegionRequest $request)
    {
        $joblocations = Region::create($request->all());
        $joblocations->save();

        return redirect()->route('backend.region.index')
                        ->with('success','Job Location created successfully.');

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
        $joblocation = Region::find($id);
        return view('admin.joblocations.edit',compact('joblocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegionRequest $request, string $id)
    {
        $joblocation = Region::find($id);
        $joblocation->update($request->all());

        $joblocation->save();

        return redirect()->route('backend.region.index')
                        ->with('success','Job Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $joblocation = Region::find($id);
        $joblocation->delete();

        return redirect()->route('backend.region.index');
    }
}
