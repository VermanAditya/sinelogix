@extends('layout.app')
@section('stylesheet')
<style>
    .main-heading h2 {
        font-weight: 700;
        text-transform: uppercase;
        padding: 15px;
        border-bottom: 2px solid;

    }
.form-group{
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
</style>
@endsection
@section('content')


<div class="container">
    <div class="row">
        <div class="main-heading my-4">
            <h2 class="text-center">
                Add Users From here
            </h2>
        </div>
    </div>
    <div class="row">
        @if(session()->has('message'))
    <div class="alert alert-success my-3">
        {{ session()->get('message') }}
    </div>
@endif
        <div class="col">
            <form action="save" method="POST" enctype="multipart/form-data" class="form-group border p-4">
                @csrf
                <input type="file" name="image" class="form-control my-2" />
                <div class="my-2 text-danger">
                    @error('image')
                        {{$message}}
                    @enderror
                </div>
                <input type="text" name="name" class="form-control my-2" placeholder="Your Name" />
                <div class="my-2 text-danger">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
                <div class="radio d-flex my-2 p-3 border">
                    <p>Your Gender : </p>
                    <div class="radio-box mx-3">
                        <input type="radio" name="gender" value="Male">
                        <label for="male">Male</label>
                    </div>
                    <div class="radio-box mx-3">
                        <input type="radio" name="gender" value="Female">
                        <label for="female">Female</label>
                    </div>
                    <div class="radio-box mx-3">
                        <input type="radio" name="gender" value="Other">
                        <label for="other">Other</label>
                    </div>
                </div>
                <div class="my-2 text-danger">
                    @error('gender')
                        {{$message}}
                    @enderror
                </div>
                <input type="number" name="number" class="form-control my-2" placeholder="Your Number" />
                <div class="my-2 text-danger">
                    @error('number')
                        {{$message}}
                    @enderror
                </div>
                <textarea name="address" class="form-control my-2" placeholder="Address..."></textarea>
                <input type="email" name="email" class="form-control my-2" placeholder="Your Email">
                <div class="my-2 text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
                <div class="hobbies-check d-flex my-2 p-2 border">
                    <p>Your Hobbies :</p>
                    <div class="hobby mx-2">

                        <input type="checkbox" name="hobby[]" value="Travelling">
                        <label for="travel">Travelling</label><br>
                    </div>

                    <div class="hobby mx-2">
                        <input type="checkbox" name="hobby[]" value="Reading Books">
                        <label for="reading">Reading Books</label><br>
                    </div>

                    <div class="hobby mx-2">
                        <input type="checkbox" name="hobby[]" value="Listening Music">
                        <label for="music">Listening Music</label><br>
                    </div>
                    <div class="hobby mx-2">
                        <input type="checkbox" name="hobby[]" value="Singing">
                        <label for="singing">Singing</label><br>
                    </div>
                </div>
                <div class="my-2 text-danger">
                    @error('hobby')
                        {{$message}}
                    @enderror
                </div>
                <select name="status" class="form-control my-2">
                    <option value="pending" disabled selected>Your Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">InActive</option>
                </select>
                <div class="my-2 text-danger">
                    @error('status')
                        {{$message}}
                    @enderror
                </div>
                <div class="button text-end">
                    <input type="submit" value="Save" class="btn btn-success w-25">
                </div>
                
            </form>
            <div class="view-users text-center my-3">
            <a href="users" class="btn btn-info text-light">View Users</a>
            </div>
        </div>
    </div>
</div>
@endsection