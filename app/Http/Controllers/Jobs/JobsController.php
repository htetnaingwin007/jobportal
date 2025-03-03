<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Jobsaved;
use App\Models\Jobapplied;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobAppliedRequest;


class JobsController extends Controller
{
    public function single($id)
    {
        $job = JobPost::find($id);

        // related jobs
        $rel_jobs = JobPost::where('category_id',$job->category_id)
        ->where('id','!=',$job->id)
        ->paginate(5);
        $total_rel_jobs = JobPost::where('category_id',$job->category_id)
        ->where('id','!=',$job->id)
        ->count();

        // saveJob 
        $savedJob = Jobsaved::where('job_id',$id)
        ->where('user_id',Auth::user()->id)
        ->count();



        //varifying if user applied for the job
        $appliedjob = Jobapplied::where('job_id',$id)
        ->where('user_id',Auth::user()->id)
        ->count();

        //category
        $categories = Category::paginate(7);
       

        return view('jobs.single',compact('job','rel_jobs','total_rel_jobs','savedJob','appliedjob','categories'));
    }

    public function saveJob(Request $request)
    {
        // dd($request->all());
        $saved_job = Jobsaved::create([
            
            'job_id' => $request->job_id,
            'user_id' => auth()->user()->id,

        ]);

        if($saved_job){
            return redirect('/jobs/single/'.$request->job_id.'')
                ->with('save','Job saved successfully');
        }
    }

    public function applyJob(JobAppliedRequest $request)
    {
        // dd($request);
        $applied_job = Jobapplied::create([
            
            'job_id' => $request->job_id,
            'user_id' => auth()->user()->id,

        ]);

        if($applied_job){
            return redirect('/jobs/single/'.$request->job_id.'')
                ->with('apply','Job applied successfully');
        }

        
    }

    public function search(Request $request)
    {

        $job_title = $request->get('job_title');
        $job_region_id = $request->get('job_region_id');
        $job_type = $request->get('job_type');
        // if($job_title){
        //     $searches = JobPost::select()->where('job_title', 'like', "%$job_title%")->paginate(10);
        //     return view('jobs.search',compact('searches'));
        // }
        // elseif($job_region_id){
        //     $searches = JobPost::select()->where('job_region_id', 'like', "%$job_region_id%")->paginate(10);
        //     return view('jobs.search',compact('searches'));

        // }
        // elseif(job_type){
        //     $searches = JobPost::select()
        //     ->where('job_title', 'like', "%$job_title%")
        //     ->where('job_region_id', 'like', "%$job_region_id%")
        //     ->where('job_type', 'like', "%$job_type%")
        //     ->paginate(10);
        // return view('jobs.search',compact('searches'));
        // }
        $searches = JobPost::query();

        if ($job_title) {
            $searches->orWhere('job_title', 'like', "%$job_title%");
        }

        if ($job_region_id) {
            $searches->orWhere('job_region_id', 'like', "%$job_region_id%");
        }

        if ($job_type) {
            $searches->orWhere('job_type', 'like', "%$job_type%");
        }

        $searches = $searches->paginate(10);
        return view('jobs.search',compact('searches'));

    }
}
