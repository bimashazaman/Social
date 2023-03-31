@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 mx-auto">
                <h1 class="mb-4">Posts</h1>
                @include('posts.partials.createPost')
                @foreach ($posts as $post)
                    <div class="card mb-3 rounded-lg" style="background-color: #141A29; padding: 15px;">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="pr-3">
                                        <a href="{{ route('profile.index', $post->user->id) }}">
                                            <img src=@if ($post->user->avatar) "{{ $post->user->avatar }}"
                                        @else "https://ui-avatars.com/api/?name={{ $post->user->name }}&&background=0D8ABC&color=fff" @endif
                                                class="rounded-circle" width="50" height="50" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold">
                                            <a href="{{ route('profile.index', $post->user->id) }}"
                                                class="text-decoration-none"
                                                style='font-size: 1.1rem; margin-left: 10px; color: #3ABEFE;'>
                                                <span>{{ $post->user->username }}</span>
                                            </a>
                                        </div>
                                        <div style="font-size: 0.8rem; margin-left: 10px;  color: #9da1a2;">
                                            {{ $post->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>

                                @if (!Auth::guest())
                                    @if (auth()->user()->id == $post->user_id)
                                        <div class="post-item" x-data="{ showOptions: false }">
                                            <!-- Post content here -->
                                            <div class="options" @click.away="showOptions = false">
                                                <button @click="showOptions = !showOptions"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                                <div class="options-menu  position-absolute  rounded   z-10"
                                                    style="background-color: #141A29; color: #3ABEFE;" x-show="showOptions"
                                                    x-transition>
                                                    <a href="{{ route('posts.edit', $post) }}"
                                                        class="btn btn-sm btn-outline-secondary m-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-secondary  m-2">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div></div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-white">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->caption }}</h5>
                            </div>

                            @if ($post->media)
                                @if (Str::endsWith($post->media, '.mp4') ||
                                        Str::endsWith($post->media, '.mov') ||
                                        Str::endsWith($post->media, '.avi') ||
                                        Str::endsWith($post->media, '.wmv') ||
                                        Str::endsWith($post->media, '.flv') ||
                                        Str::endsWith($post->media, '.mkv'))
                                    <video controls class="card-img-top">
                                        <source src="{{ asset('uploads/' . $post->media) }}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('uploads/' . $post->media) }}" class="card-img-top" alt="">
                                @endif
                            @endif
                        </a>
                        @include('posts.partials.postActions')
                    </div>
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
