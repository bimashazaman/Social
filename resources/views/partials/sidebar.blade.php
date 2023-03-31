@auth
    <div class='m-3 position-fixed start-0 ' style='z-index: 1000; top: 70px;'>
        <img src=@if (auth()->user()->avatar) "{{ $post->user->avatar }}"
                                        @else "https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=0D8ABC&color=fff" @endif
            class="rounded-circle" width="50" height="50" alt="">

        <div class="d-inline-block" style=" margin-left: 10px;">
            {{ auth()->user()->name }}
        </div>
    </div>
@endauth
