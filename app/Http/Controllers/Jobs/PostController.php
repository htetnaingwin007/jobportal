<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Company;
use App\Models\Region;
use App\Models\Category;
use App\Http\Requests\JobPostRequest;

class PostController extends Controller
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
        $categories = Category::all();
        $regions = Region::all();
        return view('jobposts.create',compact('categories','regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobPostRequest $request)
    {
        $jobposts =  JobPost::create($request->all());
        $file_name = time().'.'.$request->image->extension();
        $upload = $request->image->move(public_path('images/jobposts/'), $file_name);
        if($upload){
           $jobposts->image = "/images/jobposts/".$file_name;
        }

        $jobposts->save();
        return redirect()->route('home')
                        ->with('success','Job Post created successfully.');
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
