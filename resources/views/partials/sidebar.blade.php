@auth
    <div class='m-3 position-fixed start-0 hidden d-lg-block' style='z-index: 1000; top: 70px;'>
        <a href="{{ route('profile.index', auth()->user()->id) }}">
            <img src=@if (auth()->user()->avatar) "{{ asset('avatars/' . auth()->user()->avatar) }}"
                                        @else "https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=0D8ABC&color=fff" @endif
                class="rounded-circle" width="50" height="50">
        </a>
        <a href="{{ route('profile.index', auth()->user()->id) }}" class="text-white">
            <div class="d-inline-block" style=" margin-left: 10px;" class="text-white">
                {{ auth()->user()->name }}
            </div>
        </a>

    </div>
@endauth
