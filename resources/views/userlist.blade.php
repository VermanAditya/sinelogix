@extends('layout.app')
@section('stylesheet')
<style>
    .user {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin: auto;
    }

    .main-heading h2 {
        font-weight: 700;
        text-transform: uppercase;
        padding: 15px;
        border-bottom: 2px solid;

    }

    .product-image>img {
        width: 100px;
        height: 100px;
    }

    .u-specification {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        width: 100%;
    }

    .u-image {
        width: 30%;
        text-align: center;
    }

    .u-content {
        width: 70%;
    }
</style>

@endsection
@section('content')
<div class="container my-4">
    <div class="main-heading my-4">
        <h2 class="text-center">
            Users list
        </h2>
    </div>

@if (count($users)>0)
    @foreach($users as $user)

    <div class="user my-3 p-3 border">
        <div class="u-image">
            <img src="./images/{{$user->image}}" alt="..." width="150" height="150">
        </div>
        <div class="u-content">
            <h3 class="u-title py-2">Name - {{$user->name}}</h3>
            @if ($user->address)
            <p class="u-text pt-1">Address - {{$user->address}}</p>
            @endif
            <div class="d-flex">
                <div class="u-hobby border m-2 p-2 mt-0 pt-0">
                    <p class="user-hobby">
                        Hobbies -
                        @php
                            $hobbies = json_decode($user->hobby);
                            
                        @endphp
                       <ul>@foreach ($hobbies as $hobby)
                           <li>{{$hobby}}</li>
                       @endforeach</ul>
                       
                    </p>
                </div>
                <div class="u-status">
                    <p>
                        Currently - {{$user->status}}
                    </p>
                </div>
            </div>
            
            <div class="u-specification">
                <h5 class="u-contact">Contact No. - {{$user->number}}</h5>
                <h5 class="u-email">Email - {{$user->email}}</h5>
                <h5 class="u-gender">Gender - {{$user->gender}}</h5>
            </div>

        </div>
        <div class="operations">
            <a href = 'edit/{{ $user->id }}' class="btn btn-warning">Update</a>
            <a href = 'delete/{{ $user->id }}' class="btn btn-danger">Delete</a>
        </div>
    </div>

    @endforeach
    <div class="products-btn">
        <a href="\" class="btn btn-info my-3">Add More User</a>
    </div>
    @else
    <div class="main-heading">
        <h2>
            No Data found.....
        </h2>
    </div>
    <div class="products-btn">
        <a href="\" class="btn btn-info my-3">Add User</a>
    </div>
@endif

</div>
@endsection