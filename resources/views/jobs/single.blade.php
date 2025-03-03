@extends('layouts.app')
@section('content')
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets/images/hero_1.jpg')}}');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">{{$job->job_title}}</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>{{$job->job_title}}</strong></span>
            </div>
          </div>
        </div>
      </div>
</section>

    <div class="container mt-3">
      @if(\Session::has('save'))
        <div class="alert alert-success">
          <p>{!!\Session::get('save')!!}</p>
        </div>
      @endif
    </div>

    <div class="container mt-3">
      @if(\Session::has('apply'))
        <div class="alert alert-success">
          <p>{!!\Session::get('apply')!!}</p>
        </div>
      @endif
    </div>

    <div class="container">
      @if(\Session::has('applied'))
        <div class="alert alert-success">
          <p>{!!\Session::get('applied')!!}</p>
        </div>
      @endif
    </div>

    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="{{$job->company->company_logo}}" alt="Image" width="150px" height="150px">
              </div>
              <div>
                <h2>{{$job->job_title}}</h2>
                <div>
                  <a href="{{route('company.profile',$job->company->id)}}" class="text-decoration-none text-primary"><span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>{{$job->company->company_name}}</span></a>
                  <a href="" class="text-decoration-none text-primary"><span class="m-2"><span class="icon-room mr-2"></span>{{$job->region->location}}</span></a>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-dark">{{$job->created_at}}</span></span>
                </div>
              </div>
            </div>
          </div>
          @if(Auth::user()->role == 'company' && Auth::user()->id == $job->company->user_id)
            <div class="col-lg-4">
              <div class="row">
                <div class="col-6">
                  <a href="" class="btn btn-block btn-primary btn-md"><span class="mr-2"></span>Edit</a>
                </div>
                <div class="col-6">
                  <a href="" class="btn btn-block btn-danger btn-md"><span class="icon-trash mr-2"></span>Delete</a>
                </div>
              </div>
            </div>
          @elseif(Auth::user()->role == 'company')
            <a href="" class="btn btn-primary col-lg-4">Contact</a>
          @else
          <div class="col-lg-4">
              <div class="row">
                <div class="col-6">
                  <form action="{{route('save.job')}}" method="POST">
                      @csrf
                    
                      <input type="hidden" name="job_id" value="{{$job->id}}">
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                      
                      @if($savedJob > 0)
                        <button type="submit" name="submit" class="btn btn-block btn-light btn-md bg-success-subtle text-success-emphasis" disabled>You saved this Job</button>

                      @else
                        <button type="submit" name="submit" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Save Job</button>

                      @endif
                  </form>
                </div>
                <div class="col-6">
                  <form action="{{route('apply.job')}}" method="POST">
                      @csrf
                    
                      <input type="hidden" name="job_id" value="{{$job->id}}">
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                      
                      @if($appliedjob > 0)

                        <button type="submit" name="submit" class="btn btn-block btn-primary btn-md bg-primary-subtle text-primary-emphasis border-0" disabled>You applied this job</button>

                      @else
                          <button type="submit" name="submit" class="btn btn-block btn-primary btn-md">Apply Now</button>
                      @endif
                  </form>
                  
                </div>
              </div>
            </div>
          @endif
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
              <figure class="mb-5"><img src="{{$job->image}}" alt="Image" class="img-fluid rounded"></figure>
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job Description</h3>
              <p>{{$job->job_description}}</p>

            </div>
            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>{{$job->responsibilities}}</span></li>
               
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>{{$job->education_experience}}</span></li>
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>{{$job->other_benefits}}</span></li>
              </ul>
            </div>

          @if(Auth::user()->role == 'company' && Auth::user()->id == $job->company->user_id)
            <div class="col-lg-12">
              <div class="row">
                <div class="col-6">
                  <a href="" class="btn btn-block btn-primary btn-md"><span class="mr-2"></span>Edit</a>
                </div>
                <div class="col-6">
                  <a href="" class="btn btn-block btn-danger btn-md"><span class="icon-trash mr-2"></span>Delete</a>
                </div>
              </div>
            </div>
          @elseif(Auth::user()->role == 'company')
            <a href="" class="btn btn-primary col-lg-12">Contact</a>
          @else
            <div class="row mb-5">
              <div class="col-6">
              <form action="{{route('save.job')}}" method="POST">
                    @csrf
                  
                    <input type="hidden" name="job_id" value="{{$job->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                  
                    
                    @if($savedJob > 0)
                      <button type="submit" name="submit" class="btn btn-block btn-light btn-md bg-success-subtle text-success-emphasis" disabled><span class="bi bi-heart-filll mr-2 text-danger"></span>You saved this Job</button>

                    @else
                      <button type="submit" name="submit" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Save Job</button>

                    @endif
                </form>
              </div>
              <div class="col-6">
                <form action="{{route('apply.job')}}" method="POST">
                    @csrf
                  
                    <input type="hidden" name="job_id" value="{{$job->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    @if($appliedjob > 0)

                      <button type="submit" name="submit" class="btn btn-block btn-primary btn-md bg-primary-subtle text-primary-emphasis border-0" disabled>You applied this job</button>

                    @else
                      <button type="submit" name="submit" class="btn btn-block btn-primary btn-md">Apply Now</button>
                    @endif
                </form>
              </div>
            </div>
          @endif
            

          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on:</strong> {{$job->created_at}}</li>
                <li class="mb-2"><strong class="text-black">Vacancy:</strong> {{$job->vacancy}}</li>
                <li class="mb-2"><strong class="text-black">Employment Status:</strong> {{$job->job_type}}</li>
                <li class="mb-2"><strong class="text-black">Experience:</strong> {{$job->experience}}</li>
                <li class="mb-2"><strong class="text-black">Job Location:</strong> {{$job->job_region_id}}</li>
                <li class="mb-2"><strong class="text-black">Salary:</strong>{{$job->salary}}</li>
                <li class="mb-2"><strong class="text-black">Gender:</strong> {{$job->gender}}</li>
                <li class="mb-2"><strong class="text-black">Application Deadline:</strong> {{$job->application_deadline}}</li>
              </ul>
            </div>

            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
              <div class="px-3">
                <a href="https://www.facebook.com/share.php?u{{route('single.job',$job->id)}}&title={{$job->title}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="https://twitter.com/home/?status={{$job->title}}{{route('single.job',$job->id)}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{route('single.job',$job->id)}}&title={{$job->title}}&source=[SOURCE/DOMAIN]" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                <a href="https://pinterest.com/pin/create/bookmarklet/?media=[MEDIA]&url={{route('single.job',$job->id)}}&is_video=false&description={{$job->title}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
              </div>
            </div>

            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Categories</h3>
              <ul class="list-unstyled pl-3 mb-0">

                @foreach($categories as $category)
                
                  <li class="mb-2"><a class="text-decoration-none" href="{{route('categories.single', $category->id)}}">{{$category->name}}</a></li>

                @endforeach


              </ul>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">{{$total_rel_jobs}} Related Jobs</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">

        @foreach( $rel_jobs as $rel_job)
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="{{route('single.job',$rel_job->id)}}"></a>
            <div class="job-listing-logo">
              <img src="{{$rel_job->image}}" alt="Image" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{$rel_job->job_title}}</h2>
                <strong>{{$rel_job->company->company_name}}</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> {{$rel_job->region->location}}
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger">{{$rel_job->job_type}}</span>
              </div>
            </div>
            
          </li>
        @endforeach
  

        </ul>

        {{$rel_jobs->links()}}

      </div>
    </section>
    

    
@endsection