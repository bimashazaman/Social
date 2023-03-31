                <ul class="list-unstyled">
                    @foreach ($comments as $comment)
                        <div style='background-color: #141A29;' class="card p-3 m-3">
                            <div class="d-flex"><img
                                    src=@if ($comment->user->avatar) {{ $comment->user->avatar }} @else
                                https://ui-avatars.com/api/?name={{ $comment->user->name }}&background=0D8ABC&color=fff @endif
                                    class="mr-3 rounded-circle" alt="{{ $comment->user->name }}'s profile picture"
                                    width="64">
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
                        </div>
                    @endforeach
                </ul>
