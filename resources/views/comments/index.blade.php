@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                <br>
                <br>
                <h2>Comments</h2>
                @include('comments.partials.commentInput')
                @include('comments.partials.show', [
                    'comments' => $post->comments,
                    'post_id' => $post->id,
                ])
            </div>
        </div>
    </div>
@endsection
