@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="mb-4">Posts</h1>
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="post-item" x-data="{ showOptions: false }">
                            <!-- Post content here -->
                            <div class="options" @click.away="showOptions = false">
                                <button @click="showOptions = !showOptions" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="options-menu  position-absolute bg-white border rounded p-2 right-0 z-10"
                                    x-show="showOptions" x-transition>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
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

            </div>
        </div>
    </div>
@endsection
