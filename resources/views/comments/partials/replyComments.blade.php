<form action="{{ route('comments.reply', $comment->id) }}" method="POST" x-show="open"
    x-transition:enter="transition ease-out duration-300" class="px-lg-5 ">
    @csrf <div class="form-group d-flex justify-content-between">
        <br>
        <div style="width: 100%; margin-top: 10px;">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="reply" placeholder="Type your reply"
                style="background-color: #141A29; color: #3ABEFE; width: 100%; height: 100%; outline: none; border-radius: 20px; border: 0.2px solid #999b9d; padding: 10px;"
                required> </textarea>
            @error('reply')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" style="background-color: transparent; border: none;">
            <i class="far fa-paper-plane" style="color: #3ABEFE; font-size: 20px; margin-left: 5px;">
            </i>
        </button>
    </div>
    @foreach ($comment->replies as $reply)
        <div style='background-color: #161c2d;  width: 80%' class="card p-3 m-3 rounded-lg">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-row align-items-center">
                    <div class="comment-avatar">
                        <img src="https://ui-avatars.com/api/?name={{ $reply->user->name }}&background=0D8ABC&color=fff"
                            alt="avatar" class="rounded-circle mx-2" width="50">
                    </div>
                    <div class="comment-details ml-2">
                        <h6 class="m-0">{{ $reply->user->name }}</h6>
                        <span class="text-muted">{{ $reply->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                {{-- @include('comments.partials.replyActions') --}}
            </div>
            <div class="comment-body mt-3">
                <p>{{ $reply->reply }}</p>
            </div>
        </div>
    @endforeach
</form>
