@extends('layouts.main')

@section('main-section')
<div class="container py-5 my-5 bg-light px-5">
    <h2>Add User</h2>
        <form class="row g-3" method="post" action="add_user" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">add user</button>
            </div>
        </form>
</div>
@endsection
    


