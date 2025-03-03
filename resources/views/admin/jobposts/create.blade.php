@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
        <div class="my-3">
            <h1 class="mt-4 d-inline">Items</h1>
            <a href="{{route('backend.post.index')}}" class="btn btn-danger float-end">
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
                <form action="{{route('backend.post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="job_title" class="form-label">job_title</label>
                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title" value="{{old('job_title')}}">
                        @error('job_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="" type="hidden" name="user_id" value="{{Auth::id()}}" required autocomplete="">
                    </div>

                    <div class="mb-3">
                        <label for="job_region_id" class="form-label"> Region</label>
                        <select class="form-control @error('job_region_id') is-invalid @enderror" id="job_region_id" name="job_region_id">
                            <option value="" selected>Choose Region</option>
                            @foreach($regions as $region)
                            <option value="{{$region->id}}" {{old('job_region_id') == $region->id ? 'selected':''}}>{{$region->location}}</option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label"> Category</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                            <option value="" selected>Choose Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected':''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="job_type" class="form-label">Job Type</label>
                        <select class="form-select @error('job_type') is-invalid @enderror" id="job_type" name="job_type">
                            <option value="" selected>Choose jobtype</option>
                            <option value="parttime">Part Time</option>
                            <option value="fulltime">Full Time</option>
                            <option value="contract">Contract</option>
                            <option value="remote">Remote</option>

                        </select>
                        @error('jobtype')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="job_location">Address</label>
                        <input id="job_location" type="text" class="form-control @error('job_location') is-invalid @enderror" name="job_location" value="{{ old('job_location') }}" required autocomplete="job_location">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="vacancy" class="form-label">Vacancy</label>
                        <input type="number" class="form-control @error('vacancy') is-invalid @enderror" id="vacancy" name="vacancy" value="{{old('vacancy')}}">
                        @error('vacancy')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="experience" class="form-label">Experience</label>
                        <input type="text" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" value="{{old('experience')}}">
                        @error('experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="education_requirements">Education </label>
                        <input id="education_requirements" type="text" class="form-control @error('education_requirements') is-invalid @enderror" name="education_requirements" value="{{ old('education_requirements') }}" required autocomplete="job_title">
                        @error('education_requirements')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="salary">Salary </label>
                        <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="job_title">
                        @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
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
                    <div class="mb-3">
                        <label for="application_deadline">Application Deadline </label>
                        <input id="application_deadline" type="date" class="form-control @error('application_deadline') is-invalid @enderror" name="application_deadline" value="{{ old('application_deadline') }}" required autocomplete="application_deadline">
                        @error('application_deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="job_description" class="form-label">Descriptions</label>
                        <textarea class="form-control @error('job_description') is-invalid @enderror" id="job_description" style="height: 100px" name="job_description">{{old('job_description')}}</textarea>
                        @error('job_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="responsibilities" class="form-label">Responsibilities</label>
                        <textarea class="form-control @error('responsibilities') is-invalid @enderror" id="responsibilities" style="height: 100px" name="responsibilities">{{old('responsibilities')}}</textarea>
                        @error('responsibilities')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="other_benefits" class="form-label">other_benefits</label>
                        <textarea class="form-control @error('other_benefits') is-invalid @enderror" id="other_benefits" style="height: 100px" name="other_benefits">{{old('other_benefits')}}</textarea>
                        @error('other_benefits')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image" aria-label="Upload" name="image" value="{{old('image')}}">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row mx-1">
                        <button class="btn btn-lg btn-primary">Save</button>
                    </div>
                    </form>
            </div>
        </div>
        
    </div>
    <div>

</div>
@endsection