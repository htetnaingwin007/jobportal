<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seeker;
Use App\Models\JobPost;
Use Auth;
Use App\Models\Region;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = JobPost::with('company')->orderBy('created_at', 'desc')->paginate(10);

        $regions = Region::orderBy('id','Desc')->get();
        // dd($jobs);
        $totalJobs = JobPost::all()->count();

        return view('home',compact('jobs','totalJobs','regions'));
    }
}
