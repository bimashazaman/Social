                <ul class="list-unstyled">
                    @foreach ($comments as $comment)
                        <div style='background-color: #141A29;' class="card p-3 m-3">
                            <div class="d-flex">
                                <img src=@if ($comment->user->avatar) {{ asset('avatars/' . $comment->user->avatar) }} @else
                                https://ui-avatars.com/api/?name={{ $comment->user->name }}&background=0D8ABC&color=fff @endif
                                    class="mr-3 rounded-circle" alt="{{ $comment->user->name }}" width="64"
                                    height="64">
                                <div>
                                    <h5 class="mt-0 mb-1 align-self-center" style="margin-left: 10px;">
                                        {{ $comment->user->name }}</h5>
                                    <p class="text-muted" style="margin-left: 10px;">
                                        {{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <li class="media mb-4 d-flex" style="margin-left: 80px;">
                                <p>{{ $comment->comment }}</p>
                                <div>
                                    <div class="">
                                        @if ($comment->media)
                                            @if (Str::contains($comment->media, 'mp4'))
                                                <video src="{{ asset('comments/' . $comment->media) }}" controls
                                                    class="img-fluid" alt="Responsive image"></video>
                                            @else
                                                <img src="{{ asset('comments/' . $comment->media) }}"
                                                    style="width: 60%; margin-top: 5%" class="img-fluid"
                                                    alt="Responsive image">
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <div class="mr-3">
                                        @if ($comment->likes->contains('user_id', Auth::user()->id))
                                            <form action="{{ route('comments.dislike', $comment->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0">
                                                    {{ $comment->likes->count() }} <i class="fas fa-thumbs-up"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('comments.like', $comment->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0">
                                                    <i class="far fa-thumbs-up"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <div>
                                        {{ $comment->replies->count() }} <i class="far fa-comment"></i>
                                    </div>

                                </div>
                                <div class="mr-3">
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                            <form action="{{ route('comments.reply', $comment->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name=post_id value="{{ $post->id }}">
                                    <textarea name="reply" class="form-control @error('reply') is-invalid @enderror" name="reply"
                                        placeholder="Type your reply" style="background-color: #141A29; color: #3ABEFE; " required>
                                    </textarea>
                                    @error('reply')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Reply</button>
                            </form>
                        </div>
                    @endforeach
                </ul>
