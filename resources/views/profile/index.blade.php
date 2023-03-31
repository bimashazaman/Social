@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class=" ">
                    <center>
                        <img src="https://images.pexels.com/photos/1796794/pexels-photo-1796794.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                            alt="" width="80%" height="400px">
                    </center>
                </div>
                <center style="margin-top: -100px">
                    <img class="profile-image rounded-circle mb-4 "
                        src={{ $user->avatar ? $user->avatar : "https://ui-avatars.com/api/?name=$user->name&background=0D8ABC&color=fff" }}
                        alt="Profile Image" width="200" height="200">
                </center>
                <center>
                    <h5 class="card-title">
                        {{ $user->name }}
                    </h5>
                    @if (!Auth::guest())
                        @if (auth()->user()->id == $user->id)
                            <a class="btn btn-primary">Edit Profile</a>
                        @else
                            <a class="btn btn-primary">
                                Add Friend
                            </a>
                        @endif
                    @endif
                </center>
            </div>
        </div>
    </div>
@endsection
