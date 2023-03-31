@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="mb-4">Posts</h1>
                @foreach ($posts as $post)
                    <a href="{{ route('posts.show', $post) }}">
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
                @endforeach
                </a>
            </div>
        </div>
    </div>
@endsection
