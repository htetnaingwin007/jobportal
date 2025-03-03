@extends('layouts.app')
@section('content')
<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('front-assets/images/hero_1.jpg')}}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">{{$company->company_name}}</h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Companies</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>{{$company->company_name}}</strong></span>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="mt-5">
    <div class="container">
    <div class="row align-items-center mb-5">
        <div class="col-lg-8 mb-lg-0">
          <div class="d-flex align-items-center">
            <div class="border p-2 d-inline-block mr-3 rounded">
              <img src="{{$company->company_logo}}" alt="Image" width="150px" height="150px">  
            </div>
            <div class="ms-2">
              <h2>{{$company->company_name}}</h2>
              <div>
              <span class="ms-2 d-block h6">

              </span>

                <span class="ms-2 d-block h6"><span class="icon-room mr-2"></span>{{$company->company_address}}</span>

              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-4">
          <div class="row">
            <div class="col-12">
            @if(Auth::user()->id == $company->user_id)
              <a href="{{route('company.profileEdit', Auth::user()->id)}}" class="btn btn-block btn-primary btn-md"><span class="icon-heart mr-2"></span>Edit</a>
            @else
              <a href="#" class="btn btn-block btn-success btn-md"><span class="icon-heart mr-2"></span>Contact</a>
            @endif
            </div>
          </div>
        </div>
        
      </div>
    </div>

</section>

<section class="">
    <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">

              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>About Company</h3>
              <p>
                {{$company->about_company}}
              </p>

            </div>
            <div class="container">
              <div class="row mb-4 justify-content-center">
                <div class="col-md-7 text-center">
                  <h2 class="section-title mb-2">Listed Jobs</h2>
                </div>
              </div>
              <ul class="job-listings mb-5">
              @foreach( $listedJobs as $listedJob)
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                  <a href="job-single.html"></a>
                  <div class="job-listing-logo">
                    <img src="{{$listedJob->image}}" alt="Image" class="img-fluid">
                  </div>

                  <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                    <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                      <h2>{{$listedJob->job_title}}</h2>
                      <strong>{{$listedJob->company->company_name}}</strong>
                    </div>
                    <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                      <span class="icon-room"></span> {{$listedJob->region->location}}
                    </div>
                    <div class="job-listing-meta">
                      <span class="badge badge-danger">{{$listedJob->job_type}}</span>
                      
                    </div>
                  </div>
                  
                </li>
              @endforeach
                
              </ul>
             {{ $listedJobs->links() }}
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Company Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black"><i class="fa-solid fa-user me-1"></i> Company Author:</strong>   {{$company->user->name}}</li>
                <li class="mb-2"><strong class="text-black"><i class="fa-solid fa-industry me-1"></i> Phone Number</strong>   {{$company->company_phone}}</li>
                <li class="mb-2"><strong class="text-black"><i class="fa-solid fa-globe me-1"></i> Email Address</strong>   {{$company->user->email}}</li>
                <li class="mb-2"><strong class="text-black"><i class="fa-solid fa-users me-1"></i> Company Website</strong>   {{$company->company_website}}</li>
                <li class="mb-2"><strong class="text-black"><i class="fa-solid fa-users me-1"></i> Registered Date</strong>   {{$company->created_at}}</li>
              </ul>
            </div>

            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
              <div class="px-3">
                <a href="" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="" id="next">
    
  </section>


@endsection
