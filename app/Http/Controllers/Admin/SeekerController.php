<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seeker;
use App\Models\User;
use App\Http\Requests\SeekerRequest;
use App\Http\Requests\UpdateSeekerRequest;

class SeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seekers = Seeker::orderBy('id', 'DESC')->get();
        return view('admin.seekers.index',compact('seekers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seekers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeekerRequest $request)
    {
        $user = User::create($request->all());
        $user->save();

        $seekers = Seeker::create(array_merge(['user_id' => $user->id], $request->all()));

        $seeker_image = time().'.'.$request['image']->extension(); //123412343434.png

        $upload_seeker = $request['image']->move(public_path('images/profiles/'),$seeker_image);
        if($upload_seeker){
            $seekers->image = "/images/profiles/".$seeker_image;
        } 

        $seekr_cv = time().'.'.$request['resume']->extension(); //123412343434.png

        $upload_seeker1 = $request['resume']->move(public_path('images/resumes/'),$seekr_cv);
        if($upload_seeker1){
            $seekers->resume = "/images/resumes/".$seekr_cv;
        } 

        $seekers->save();
        return redirect()->route('backend.seeker.index')
        ->with('success','Seeker created successfully.');

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
        $seeker = Seeker::find($id);
        return view('admin.seekers.edit',compact('seeker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeekerRequest $request, string $id)
    {
        $seeker = Seeker::find($id);
        $seeker->update($request->all());
        $seeker->save();

        $user = User::find($seeker->user_id);
        $user->update($request->all());
        $user->save();


        if($request->hasFile('image')){
            $seeker_image = time().'.'.$request['image']->extension(); //123412343434.png

            $upload_seeker = $request['image']->move(public_path('images/profiles/'),$seeker_image);
            if($upload_seeker){
                $seeker->image = "/images/profiles/".$seeker_image;
            } 
        }else{
            $seeker->image = $request->old_image;
        }

        if($request->hasFile('resume')){

            $seekr_cv = time().'.'.$request['resume']->extension(); //123412343434.png

            $upload_seeker1 = $request['resume']->move(public_path('images/resumes/'),$seekr_cv);
            if($upload_seeker1){
                $seeker->resume = "/images/resumes/".$seekr_cv;
            } 
        }else{
            $seeker->resume = $request->old_image1;
        }

        $seeker->save();

        return redirect()->route('backend.seeker.index')
                        ->with('success','Seeker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
