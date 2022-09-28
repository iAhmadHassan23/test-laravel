@extends('layouts.main')
@section('main-section')

<div class="container my-5 py-5">
    <div class="text-end mb-2">
        <a href="{{url('/')}}/add_user" class="btn btn-primary">Add User</a>
        <a href="{{url('/')}}/trashed" class="btn btn-danger">View Trash</a>
    </div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <img src="{{asset('image/'.$user->image)}}"  style="width: 100px; height: 100px; object-fit: contain;" />
                </td>
                <td>
                    <a href="{{url('/')}}/view_user/{{$user->id}}" class="btn btn-primary">View</a>
                    <a href="{{url('/')}}/edit_user/{{$user->id}}" class="btn btn-warning">Edit</a>
                    <a href="{{url('/')}}/delete_user/{{$user->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection