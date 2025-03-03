@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets/images/hero_1.jpg')}}');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"></h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong></strong></span>
            </div>
          </div>
        </div>
      </div>
</section>


<div class="container mt-5">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <div class="text-center border-end">
                                <img src="{{$seeker->image}}" class="img-fluid avatar-xxl rounded-circle" alt="">
                                <h4 class="text-primary font-size-20 mt-3 mb-2">{{$seeker->user->name}}</h4>
                                
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-9">
                            <div class="ms-3 row">
                                <div class="col-10">
                                    <h4 class="card-title mb-2">Biography</h4>
                                    <p class="mb-0 text-muted">{{$seeker->bio}}</p>
                                </div>
                                <div class="col-2">
                                    <a href="" class="text-decoration-none text-info">Edit_<i class="fa-solid fa-gear fa-xl"></i></a>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div>
                                            <span class="text-muted fw-medium d-block mb-1"><i class="fa-solid fa-envelope me-2"></i> {{$seeker->user->email}}</span>
                                            <span class="text-muted fw-medium d-block mb-1"><i class="fa-solid fa-phone me-2"></i> {{$seeker->phone}}</span>

                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            
                                <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link px-4" data-bs-toggle="tab" href="#projects-tab" role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Resume</span>
                                        </a>
                                    </li><!-- end li -->
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link px-4 active"  href="" target="__blank" >
                                            <span class="d-block d-sm-none"><i class="mdi mdi-menu-open"></i></span>
                                            <span class="d-none d-sm-block">Saved Job</span>
                                        </a>
                                    </li><!-- end li -->
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link px-4 "  href="" target="__blank" >
                                            <span class="d-block d-sm-none"><i class="mdi mdi-account-group-outline"></i></span>
                                            <span class="d-none d-sm-block">Applied Job</span>
                                        </a>
                                    </li><!-- end li -->
                                </ul><!-- end ul -->
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->

            <div class="card">
                <div class="tab-content p-4">
                    <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                        <div class="d-flex align-items-center">
                            <div class="flex-1">
                                <img src="{{$seeker->resume}}" alt="" class="img-fluid">
                            </div>
                        </div>

                        <div class="row" id="all-projects">
                           
                        </div><!-- end row -->
                    </div><!-- end tab pane -->

                </div>
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="pb-2">
                        <a href="" class="btn btn-lg btn-success btn-block">Download CV</a>
                        
                        <!-- end ul -->
                    </div>
                    <hr>
                    <div class="pt-2">
                        <h4 class="card-title mb-4">My Skill</h4>
                        <div class="d-flex gap-2 flex-wrap">
                            <p class="text-primary">{{$seeker->skill}}</p>

                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title mb-4">Personal Details</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td>{{$seeker->user->name}}</td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <th scope="row">Location</th>
                                        <td>{{$seeker->location}}</td>
                                    </tr><!-- end tr -->
                                    
                                    <tr>
                                        <th scope="row">Website</th>
                                        <td>{{$seeker->socail_media}}</td>
                                    </tr><!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title mb-4">Work Experince</h4>
                        <p>{{$seeker->workexperience}}</p>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div>
</div>

@endsection