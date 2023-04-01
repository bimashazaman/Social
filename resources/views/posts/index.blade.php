@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 mx-auto">
                <h1 class="mb-4">Posts</h1>
                @include('posts.partials.createPost')
                @foreach ($posts as $post)
                    @include('posts.partials.Card', ['post' => $post])
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    <script>
        function saveScrollPosition() {
            sessionStorage.setItem('scrollPosition', window.pageYOffset);
        }
        window.onload = function() {
            var scrollPosition = sessionStorage.getItem('scrollPosition');
            if (scrollPosition !== null) {
                window.scrollTo(0, scrollPosition);
                sessionStorage.removeItem('scrollPosition');
            }
        }
    </script>
@endsection
