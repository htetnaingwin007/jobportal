@extends('layouts.app')

@section('content')
    

<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets/images/hero_1.jpg')}}');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">{{$category->name}}</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>{{$category->name}}</strong></span>
            </div>
          </div>
        </div>
      </div>
</section>



<section class="site-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="section-title mb-2">{{$category->name}} Jobs</h2>
        </div>
      </div>

      <ul class="job-listings mb-5">
        @if($jobs->count() > 0)

          @foreach( $jobs as $job)
              <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
              <a href="{{route('single.job',$job->id)}}"></a>
              <div class="job-listing-logo">
                  <img src="{{$job->image}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
              </div>

              <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                  <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                  <h2>{{$job->job_title}}</h2>
                  <strong>{{$job->company->company_name}}</strong>
                  </div>
                  <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                  <span class="icon-room"></span> {{$job->region->location}}
                  </div>
                  <div class="job-listing-meta">
                  <span class="badge badge-danger">{{$job->job_type}}</span>
                  </div>
              </div>

              </li>
          @endforeach

        @else
              <div class="container border-0">
                <div class="alert alert-success">
                  <p>No job in this Category just yet</p>
                </div>
              </div>
        @endif

      </ul>

      {{ $jobs->links() }}

    </div>
  </section>



@endsection