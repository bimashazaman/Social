@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="d-flex align-items-center mb-3">
                    <div>
                        <a href="{{ route('profile.index', $post->user->id) }}">
                            <img src=@if ($post->user->avatar) "{{ $post->user->avatar }}"
                                        @else "https://ui-avatars.com/api/?name={{ $post->user->name }}&&background=0D8ABC&color=fff" @endif
                                class="rounded-circle" width="50" height="50" alt="">
                        </a>
                    </div>
                    <div class="ms-3">
                        {{ $post->user->name }}
                    </div>
                </div>
                <div class="m-2">
                    {{ $post->caption }}
                </div>
                <div class="card mb-4">
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
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->caption }}</h5>
                        <p class="card-text">
                            <small class="text-muted">
                                By {{ $post->user->name }}
                                on {{ $post->created_at->format('M d, Y') }}
                            </small>
                        </p>
                    </div>
                </div>
                @include('posts.partials.postActions', ['post' => $post])
                @include('comments.partials.show', [
                    'comments' => $post->comments,
                    'post_id' => $post->id,
                ])
            </div>
        </div>
    </div>
@endsection
