<?php

namespace App\Http\Controllers\Seekers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seeker;
use App\Models\JobPost;
use App\Models\Jobsaved;
use App\Models\Jobapplied;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class SeekerController extends Controller
{
    public function seekerProfileproject($id)
    {
        $seeker = Seeker::find($id);
        // dd($seeker);
        return view('seekers.profileproject',compact('seeker'));
    }
    public function seekerProfilesaved($id)
    {
        $seeker = Seeker::find($id);
        // dd($seeker);
        $savedJobs = Jobsaved::where('user_id', $seeker->user_id)
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        return view('seekers.profilesaved',compact('savedJobs','seeker'));
    }
    public function seekerProfileapplied($id)
    {
        $seeker = Seeker::find($id);
        // dd($seeker);
        $appliedJobs = Jobapplied::where('user_id', $seeker->user_id)
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        return view('seekers.profileapplied',compact('appliedJobs'));
    }
    public function seekerProfileEdit()
    {
        return view('seekers.profile-edit');
    }
}
