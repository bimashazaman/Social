@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div>
                    <div class="d-flex justify-content-around align-items-center">
                        <div
                            style="margin-top:15px; font-weight: 600; color: #3ABEFE; text-transform: uppercase; letter-spacing: 1px;">
                            <a href="{{ route('friends') }}" class="text-decoration-none" style="color: #3ABEFE;">
                                <i class="fas fa-user-friends"></i>
                                Friends
                            </a>
                        </div>

                        <div
                            style="margin-top:15px; font-weight: 600; color: #3ABEFE; text-transform: uppercase; letter-spacing: 1px;">
                            <a href="{{ route('friend-requests') }}" class="text-decoration-none" style="color: #3ABEFE;">
                                <i class="fas fa-user-plus"></i>
                                Friend Requests
                            </a>
                        </div>
                        <div
                            style="margin-top:15px; font-weight: 600; color: #3ABEFE; text-transform: uppercase; letter-spacing: 1px;">
                            <a href="{{ route('sent-friend-requests') }}" class="text-decoration-none"
                                style="color: #3ABEFE;">
                                <i class="fas fa-user-plus"></i>
                                Sent Requests
                            </a>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div>
                        @foreach ($friends as $friend)
                            <div class="d-flex justify-content-between align-items- w-100 mt-3">
                                <div class="d-flex align-items-center">
                                    <img src=@if ($friend->avatar) {{ asset('avatars/' . $friend->avatar) }}
                                        @else "https://ui-avatars.com/api/?name={{ $friend->name }}&&background=0D8ABC&color=fff" @endif
                                        style="width: 50px; height: 50px; border-radius: 50%;">
                                    <div class="pl-3">
                                        <a href="{{ route('profile.index', $friend->id) }}" class="text-decoration-none"
                                            style="font-size: 1.1rem; color: #3ABEFE; margin-left: 10px;">
                                            {{ $friend->name }}</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <form action="{{ route('accept-friend', $friend->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success" style="margin-right: 10px;">
                                            <i class="fas fa-user-plus"></i> Accept
                                        </button>
                                    </form>
                                    <form action="{{ route('reject-friend-request', $friend->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-user-times"></i> Reject
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endsection
