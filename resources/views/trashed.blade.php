@extends('layouts.main')
@section('main-section')

<div class="container my-5 py-5">
    <div class="text-end mb-2">
        <a href="{{url('/')}}" class="btn btn-primary">All User</a>
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
                    <a href="{{url('/')}}/restore_user/{{$user->id}}" class="btn btn-warning">Restore</a>
                    <a href="{{url('/')}}/permanent_delete_user/{{$user->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection