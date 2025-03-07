@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
        <div class="my-3">
            <h1 class="mt-4 d-inline">Items</h1>
            <a href="{{route('backend.post.create')}}" class="btn btn-primary float-end" >
                Create
            </a>

        </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
        <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Social Media</th>
                       
                        <th>Skills</th>
                        
                        <th>WorkExperience</th>
                        <th>Date of Birth</th>
                        
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Social Media</th>
                        <th>Skills</th>
                        <th>WorkExperience</th>
                        <th>Date of Birth</th>
                        
                        <th>#</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $i=1;
                    @endphp

                    @foreach($seekers as $seeker)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$seeker->id}}</td>
                        <td><img src="{{$seeker->image}}" alt="" width="50" height="50"></td>
                        <td>{{$seeker->user->name}}</td>
                        <td>{{$seeker->user->email}}</td>
                        <td>{{$seeker->phone}}</td>
                        <td>{{$seeker->location}}</td>
                        <td>{{$seeker->socail_media}}</td>
                        <td>{{$seeker->skill}}</td>
                        <td>{{$seeker->workexperience}}</td>
                        <td>{{$seeker->date_of_birth}}</td>
                        
                        <td>
                            <div class="d-flex">
                                <a href="{{route('backend.seeker.edit',$seeker->id)}}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <button class="btn btn-sm btn-danger delete" data-id="{{$seeker->id}}">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
               
                
            </table>
           
        </div>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Are you sure delete?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                    <form action="" id="deleteForm" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
            </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('tbody').on('click','.delete',function(){
                // alert('hello');
                let id = $(this).data('id');
                // console.log(id);
                $('#deleteForm').attr('action',`seeker/${id}`);
                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection