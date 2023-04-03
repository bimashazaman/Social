<form action="{{ route('comments.reply', $comment->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="hidden" name=post_id value="{{ $post->id }}">
        <textarea name="reply" name="reply" placeholder="Type your reply"
            style="background-color: #141A29; color: #3ABEFE; border: 1px solid #3ABEFE; border-radius: 20px; " required>
                                    </textarea>
        @error('reply')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Reply</button>
</form>
