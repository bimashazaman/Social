@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('profile.partial.profileHeader')
        </div>
        <div>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    @foreach ($posts as $post)
                        @include('posts.partials.Card', ['post' => $post])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
