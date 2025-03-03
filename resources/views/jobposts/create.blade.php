@extends('layouts.app')

@section('content')
<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Post A Job</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Post a Job</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="site-section">
      <div class="container">

        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div>
                <h2>Post A Job</h2>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row mb-5">
          <div class="col-lg-12">
            <form class="p-4 p-md-5 border rounded" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
              @csrf
              <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>
              
              <div class="form-group">
                <label for="job_title">Job Title</label>
                <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="job_title">
                @error('job_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">

                <input id="" type="hidden" name="user_id" value="{{Auth::id()}}" required autocomplete="">
                
              </div>

              <div class="form-group">
                <label for="job_region_id" class="form-label"> Region</label>
                <select class="form-select @error('job_region_id') is-invalid @enderror" id="job_region_id" name="job_region_id">
                    <option value="" selected>Choose Region</option>
                    @foreach($regions as $region)
                    <option value="{{$region->id}}" {{old('job_region_id') == $region->id ? 'selected':''}}>{{$region->location}}</option>
                    @endforeach

                    
                </select>
                @error('job_region_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                    <option value="" selected>Choose Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected':''}}>{{$category->name}}</option>
                    @endforeach

                    
                </select>
                @error('location_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                  <label for="job_type" class="form-label">Job Type</label>
                  <select class="form-select @error('job_type') is-invalid @enderror" id="job_type" name="job_type">
                      <option value="" selected>Choose jobtype</option>
                      <option value="parttime">Part Time</option>
                      <option value="fulltime">Full Time</option>
                      <option value="contract">Contract</option>
                      <option value="remote">Remote</option>

                  </select>
                  @error('job_type')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="job_location">Address</label>
                <input id="job_location" type="text" class="form-control @error('job_location') is-invalid @enderror" name="job_location" value="{{ old('job_location') }}" required autocomplete="job_location">
                @error('job_location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>


              <div class="form-group">
                <label for="vacancy">Vacancy </label>
                <input id="vacancy" type="number" class="form-control @error('vacancy') is-invalid @enderror" name="vacancy" value="{{ old('vacancy') }}" required autocomplete="job_title">
                @error('vacancy')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="experience">experience </label>
                <input id="experience" type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ old('experience') }}" required autocomplete="job_title">
                @error('experience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="education_requirements">Education </label>
                <input id="education_requirements" type="text" class="form-control @error('education_requirements') is-invalid @enderror" name="education_requirements" value="{{ old('education_requirements') }}" required autocomplete="job_title">
                @error('education_requirements')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="salary">Salary </label>
                <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="job_title">
                @error('salary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                      <option value="" selected>Choose Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>
                  @error('gender')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
             
              <div class="form-group">
                <label for="application_deadline">Application Deadline </label>
                <input id="application_deadline" type="date" class="form-control @error('application_deadline') is-invalid @enderror" name="application_deadline" value="{{ old('application_deadline') }}" required autocomplete="application_deadline">
                @error('application_deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>


              <div class="form-group">
                <label for="job_description" class="form-label">Descriptions</label>
                <textarea class="form-control @error('job_description') is-invalid @enderror" id="job_description" style="height: 100px" name="job_description">{{old('job_description')}}</textarea>
                @error('job_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="responsibilities" class="form-label">Responsibilities</label>
                <textarea class="form-control @error('responsibilities') is-invalid @enderror" id="responsibilities" style="height: 100px" name="responsibilities">{{old('responsibilities')}}</textarea>
                @error('responsibilities')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="other_benefits" class="form-label">other_benefits</label>
                <textarea class="form-control @error('other_benefits') is-invalid @enderror" id="other_benefits" style="height: 100px" name="other_benefits">{{old('other_benefits')}}</textarea>
                @error('other_benefits')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="image" class="form-label company-website-tw d-block">Upload Profile</label>
                
                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image" aria-label="Upload" name="image" value="{{old('image')}}">
        
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="row">
                  <div>
                      <button type="submit" name="submit" class="btn btn-primary btn-lg">
                          Post Job
                      </button>
                  </div>
              </div>

            </form>
          </div>

         
        </div>
        
      </div>
    </section>
@endsection