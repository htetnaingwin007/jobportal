@extends('layouts.app')

@section('content')
<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Edit Profile Info</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Profile</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Edit</strong></span>
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
                <h2>Edit Profile Info</h2>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <form method="POST" class="p-4 p-md-5 border rounded" action="{{ route('company.profileUpdate', $company->id) }}" enctype="multipart/form-data">
                    @csrf
                    <h6 class="text-black mb-5 border-bottom pb-2">Company Registeration Form</h6>

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $company->user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="role" value="company">
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $company->user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ $company->company_name }}" required autocomplete="company_name">
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="form-group">
                        <label for="company_phone">Company Phone Number</label>
                        <input id="company_phone" type="number" class="form-control @error('company_phone') is-invalid @enderror" name="company_phone" value="{{ $company->company_phone }}" required autocomplete="company_phone">
                            @error('company_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    

                    <div class="form-group">
                        <label for="company_address">Company Address</label>
                        <input id="company_address" type="text" class="form-control @error('company_address') is-invalid @enderror" name="company_address" value="{{ $company->company_address }}" required autocomplete="company_address">
                            @error('company_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="form-group">
                        <label for="company_website">Company Social Link</label>
                        <input id="company_website" type="text" class="form-control @error('company_website') is-invalid @enderror" name="company_website" value="{{ $company->company_website }}" required autocomplete="company_website">
                            @error('company_website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="form-group">
                        <label for="total_employees">Total Employee</label>
                        <input id="total_employees" type="number" class="form-control @error('total_employees') is-invalid @enderror" name="total_employees" value="{{ $company->total_employees }}" required autocomplete="total_employees">
                            @error('total_employees')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="form-group">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Logo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Logo</button>
                            </li>
                            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane p-3 fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <img src="{{$company->company_logo}}" alt="" class="w-25 h-25 m-2">
                                <input type="hidden" name="old_image" id="" value="{{$company->company_logo}}">
                            </div>
                            <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                <input type="file" accept="image/*" class="m-2 form-control @error('company_logo') is-invalid @enderror" id="image" aria-label="Upload" name="company_logo" value="{{old('company_logo')}}">
                            </div>
                            
                        </div>
                        
                        @error('company_logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <div class="">
                            <label for="about_company" class="form-label">About Company</label>
                            <textarea class="form-control @error('about_company') is-invalid @enderror" id="about_company" style="height: 100px" name="about_company">{{$company->about_company}}</textarea>
                        </div>
                        @error('about_company')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>  

                    <div class="row-0">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
        
      </div>
    </section>
@endsection