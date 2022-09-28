@extends('layouts.main')
@section('main-section')

<div class="container my-5 py-5">
    <div class="text-end mb-2">
        <a href="{{url('/')}}" class="btn btn-primary">All Users</a>
    </div>
    <div class="card">
        <img src="{{asset('image/'.$user->image)}}" class="card-img-top" alt="..." style="height: 300px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
            <p class="card-text">{{$user->phone}}</p>
            <p class="card-text">{{$user->email}}</p>
        </div>
    </div>
</div>

@endsection