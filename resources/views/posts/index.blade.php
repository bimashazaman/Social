@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="mb-4">Posts</h1>
                @foreach ($posts as $post)
                    <div class="card mb-3 rounded-lg" style="background-color: #141A29; padding: 15px;">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="pr-3">
                                        <img src=@if ($post->user->avatar) "{{ $post->user->profile->profileImage() }}" @else
                                        "https://www.gravatar.com/avatar/{{ md5($post->user->email) }}?d=mp" @endif
                                            alt="avatar" class="rounded-circle w-100" style="max-width: 50px;">
                                    </div>
                                    <div>
                                        <div class="font-weight-bold">
                                            <a href="" class="text-decoration-none"
                                                style='font-size: 1.1rem; margin-left: 10px; color: #3ABEFE;'>
                                                <span>{{ $post->user->username }}</span>
                                            </a>
                                        </div>
                                        <div style="font-size: 0.8rem; margin-left: 10px;  color: #3ABEFE;">
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
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->caption }}</h5>
                        </div>
                        <a href="{{ route('posts.show', $post) }}">
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
                        <div class="d-flex align-items-center justify-content-between w-100 mb-2 mt-3">
                            <div class="d-flex align-items-center w-100 justify-content-around">
                                <div class="pr-3">
                                    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none"
                                        style="font-family: 'Russo One', sans-serif; font-size: 1rem; margin-left: 10px; color: #3ABEFE;">
                                        3 Comments
                                        <i class="far fa-comment"></i>
                                    </a>
                                </div>
                                <div class="pr-3">
                                    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none"
                                        style="font-family: 'Russo One', sans-serif; font-size: 1rem; margin-left: 10px; color: #3ABEFE;">

                                        3 Likes
                                        <i class="far fa-heart"></i>
                                    </a>
                                </div>
                                <div class="pr-3">
                                    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none"
                                        style="font-family: 'Russo One', sans-serif; font-size: 1rem; margin-left: 10px; color: #3ABEFE;">
                                        3 Shares
                                        <i class="far fa-paper-plane"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
