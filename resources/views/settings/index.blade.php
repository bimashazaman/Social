@extends('layouts.app')

@if (Auth::user()->id == $user->id)
    @section('content')
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <div>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        @include('profile.partial.profileEditForm')
                        {{-- Logout --}}
                        <center>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger w-75 mx-auto">
                                    Logout</button>
                            </form>
                        </center>

                    </div>
                </div>
            </div>
        </div>
    @else
        <p>
            You are not authorized to view this page.
        </p>
    @endif
@endsection
