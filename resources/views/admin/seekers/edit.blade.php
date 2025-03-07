@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
        <div class="my-3">
            <h1 class="mt-4 d-inline">Items</h1>
            <a href="{{route('backend.seeker.index')}}" class="btn btn-danger float-end">
                Cancel
            </a>

        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Jobpost</li>
            
            <li class="breadcrumb-item active">Create Jobpost</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Post Lists
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('backend.seeker.update',$seeker->id)}}" enctype="multipart/form-data">
                    
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $seeker->user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="role" value="seeker">
                    </div>

                    <div class="mb-3">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $seeker->user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone Number</label>
                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $seeker->phone }}" required autocomplete="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="mb-3">
                        <label for="location">Address</label>
                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ $seeker->location }}" required autocomplete="location">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="mb-3">
                        <label for="socail_media">Weblink</label>
                        <input id="socail_media" type="text" class="form-control @error('socail_media') is-invalid @enderror" name="socail_media" value="{{ $seeker->socail_media }}" required autocomplete="socail_media">
                            @error('socail_media')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    

                    <div class="mb-3">
                        <label for="skill">Skill</label>
                        <input id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ $seeker->skill }}" required autocomplete="skill">
                            @error('skill')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    <div class="mb-3">
                        <label for="date_of_birth">Birthday</label>
                        <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $seeker->date_of_birth }}" required autocomplete="date_of_birth">
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>

                    
                    <div class="mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Image</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                            </li>
                            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <img src="{{$seeker->image}}" alt="" class="w-25 h-25 m-2">
                                <input type="hidden" name="old_image" id="" value="{{$seeker->image}}">
                            </div>
                            <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                <input type="file" accept="image/*" class="m-2 form-control @error('image') is-invalid @enderror" id="image" aria-label="Upload" name="image">
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="image-tab1" data-bs-toggle="tab" data-bs-target="#image-tab-pane1" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Resume</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="new_image-tab1" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane1" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Resume</button>
                            </li>
                            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="image-tab-pane1" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <img src="{{$seeker->resume}}" alt="" class="w-25 h-25 m-2">
                                <input type="hidden" name="old_image1" id="" value="{{$seeker->resume}}">
                            </div>
                            <div class="tab-pane fade" id="new_image-tab-pane1" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                <input type="file" accept="image/*" class="m-2 form-control @error('resume') is-invalid @enderror" id="resume" aria-label="Upload" name="resume">
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    

                    <div class="mb-3">
                        <div class="">
                            <label for="workexperience" class="form-label">Education or Workexperience</label>
                            <textarea class="form-control @error('workexperience') is-invalid @enderror" id="workexperience" style="height: 100px" name="workexperience">{{$seeker->workexperience}}</textarea>
                        </div>
                        @error('workexperience')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>  

                    <div class="mb-3">
                        <div class="">
                            <label for="bio" class="form-label">Biography</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" style="height: 100px" name="bio">{{$seeker->bio}}</textarea>
                        </div>
                        @error('bio')
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
    <div>

</div>
@endsection