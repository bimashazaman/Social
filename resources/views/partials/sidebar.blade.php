@auth
    <div class='m-3 position-fixed start-0 ' style='z-index: 1000; top: 70px;'>
        <img src=@if (auth()->user()->avatar) {{ asset('uploads/' . auth()->user()->avatar) }}
    @else
        {{ asset('logo/default.jpg') }} @endif
            class="rounded-circle" style=" height: 50px; width: 50px;" alt="">
        <div class="d-inline-block" style=" margin-left: 10px;">
            {{ auth()->user()->username }}
        </div>
    </div>
@endauth
