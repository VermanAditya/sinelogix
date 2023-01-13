@extends('layout.app')
@section('stylesheet')

@endsection
@section('content')

@php
   $hobbies = json_decode($data->hobby);
@endphp
<div class="container">
    <div class="row"> 
        <div class="main-heading my-4">
            <h2 class="text-center">
                Update User data From here
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/update" method="POST" enctype="multipart/form-data" class="form-group border p-4">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <input type="file" name="image"  class="form-control my-2" />
                <div class="my-2 text-danger">
                    @error('image')
                    {{$message}}
                    @enderror
                </div>
                <input type="text" name="name" class="form-control my-2" value=" {{$data->name}} " placeholder="Your Name" />
                <div class="my-2 text-danger">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
                <div class="radio d-flex my-2 p-3 border">
                    <p>Your Gender : </p>
                    <div class="radio-box mx-3">
                        <input type="radio" name="gender" value="Male"{{ $data->gender == 'Male' ? 'checked' : '' }}>
                        <label for="male">Male</label>
                    </div>
                    <div class="radio-box mx-3">
                        <input type="radio" name="gender" value="Female"{{ $data->gender == 'Female' ? 'checked' : '' }}>
                        <label for="female">Female</label>
                    </div>
                    <div class="radio-box mx-3">
                        <input type="radio" name="gender" value="Other"{{ $data->gender == 'Other' ? 'checked' : '' }}>
                        <label for="other">Other</label>
                    </div>
                </div>
                <div class="my-2 text-danger">
                    @error('gender')
                    {{$message}}
                    @enderror
                </div>
                <input type="number" name="number" class="form-control my-2" value="{{ $data->number }}" placeholder="Your Number" />
                <div class="my-2 text-danger">
                    @error('number')
                    {{$message}}
                    @enderror
                </div>
                @isset($data)
                <textarea name="address" class="form-control my-2" placeholder="Address...">{{$data->address}}</textarea>
                @else
                <textarea name="address" class="form-control my-2" placeholder="Address..."></textarea>
                @endIf
                <input type="email" name="email" class="form-control my-2" value="{{ $data->email }}" placeholder="Your Email">
                <div class="my-2 text-danger">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
                <div class="hobbies-check d-flex my-2 p-2 border">
                    <p>Your Hobbies :</p>
                    <div class="hobby mx-2">

                        <input type="checkbox" name="hobby[]" value="Travelling" {{ in_array('Travelling', $hobbies) ? 'checked' : '' }}>
                        <label for="travel">Travelling</label><br>
                    </div>

                    <div class="hobby mx-2">
                        <input type="checkbox" name="hobby[]" value="Reading Books"{{ in_array('Reading Books', $hobbies) ? 'checked' : '' }}>
                        <label for="reading">Reading Books</label><br>
                    </div>

                    <div class="hobby mx-2">
                        <input type="checkbox" name="hobby[]" value="Listening Music"{{ in_array('Listening Music', $hobbies) ? 'checked' : '' }}>
                        <label for="music">Listening Music</label><br>
                    </div>
                    <div class="hobby mx-2">
                        <input type="checkbox" name="hobby[]" value=""{{ in_array('Singing', $hobbies) ? 'checked' : '' }}>
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
                    <option value="active" {{($data->status === 'active') ? 'Selected' : ''}}>Active</option>
                    <option value="inactive" {{($data->status === 'inactive') ? 'Selected' : ''}}>InActive</option>
                </select>
                <div class="my-2 text-danger">
                    @error('status')
                    {{$message}}
                    @enderror
                </div>
                <div class="button text-end">
                    <input type="submit" value="Update" class="btn btn-success w-25">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection