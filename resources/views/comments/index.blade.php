<!-- comments.index.blade.php -->

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                <br>
                <br>
                <h2>Comments</h2>
                <div class="card" style="background-color: #141A29; color: #3ABEFE;">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <form action="{{ route('comments.store', $post) }}" method="POST" enctype="multipart/form-data"
                                x-data="{ media: '', video: '', location: '', friends: [] }">
                                @csrf
                                <div class="form-group">
                                    <textarea name="comment" id="comment" rows="3" class="form-control @error('comment') is-invalid @enderror"
                                        style="background-color: #141A29; color: #3ABEFE;" placeholder="Type your comment"></textarea>
                                    @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" x-data="{ show: false }">
                                    <label for="media">{{ __('Media') }}</label>
                                    <input id="media" type="file" name="media[]" multiple="multiple"
                                        class="form-control-file @error('media') is-invalid @enderror"
                                        x-on:change="media = $event.target.files[0]">
                                    @error('media')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="mt-2" x-show="media" x-cloak>
                                        <div x-show="media.type.includes('image')">
                                            <img :src="URL.createObjectURL(media)" class="img-fluid" alt="Responsive image">
                                        </div>
                                        <div x-show="media.type.includes('video')">
                                            <video :src="URL.createObjectURL(media)" controls class="img-fluid"
                                                alt="Responsive image"></video>
                                        </div>
                                        <div class="mt-2">
                                            <button type="button"
                                                style='
                                            background-color: #fff;
                                            border: 1px solid #ced4da;
                                            border-radius: .25rem;
                                            padding: .375rem .75rem;
                                            font-size: 1rem;
                                            line-height: 1.5;
                                            color: #495057;
                                            background-color: #fff;
                                            background-clip: padding-box;
                                            border: 1px solid #ced4da;
                                            border-radius: .25rem;
                                            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                            '
                                                x-on:click="media = ''">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                @include('comments.partials.show', [
                    'comments' => $post->comments,
                    'post_id' => $post->id,
                ])
            </div>
        </div>
    </div>
@endsection
