<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Category;
use App\Models\Region;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobposts = JobPost::orderBy('id', 'DESC')->get();
        return view('admin.jobposts.index',compact('jobposts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $regions = Region::all();
        return view('admin.jobposts.create',compact('categories','regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $jobposts =  JobPost::create($request->all());
        // dd($jobposts);
        $file_name = time().'.'.$request->image->extension();
        $upload = $request->image->move(public_path('images/jobposts/'), $file_name);
        if($upload){
           $jobposts->image = "/images/jobposts/".$file_name;
        }

        $jobposts->save();
        return redirect()->route('backend.post.index')
                        ->with('success','Job Post created successfully.');
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
        $regions = Region::all();
        $categories = Category::all();
        $post = JobPost::find($id);
        return view('admin.jobposts.edit',compact('post','regions','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = JobPost::find($id);
        $post->update($request->all());

        if ($request->hasFile('image')) {
            // file update 
            $file_name = time().'.'.$request->image->extension();

            $upload = $request->image->move(public_path('images/jobposts/'),$file_name);
            
            if($upload){
                $post->image = "/images/jobposts/".$file_name;
            }
        }else{
             $post->image = $request->old_image;
        }

        $post->save();
        return redirect()->route('backend.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = JobPost::find($id);
        $post->delete();
        
        return redirect()->route('backend.post.index');
    }
}
