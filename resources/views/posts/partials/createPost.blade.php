<div class="card mb-3 rounded-lg" style="background-color: #141A29; padding: 15px;">
    <div class="d-flex w-100 ">
        <div class="pr-3 py-3">
            <img src=@if (auth()->user()->avatar) "{{ auth()->user()->profile->profileImage() }}" @else
                            "https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?d=mp" @endif
                alt="avatar" class="rounded-circle w-100" style="max-width: 50px;">
        </div>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            <div class="d-flex w-100 justify-content-between">
                <div class="w-100 px-2">
                    <div class="font-weight-bold d-flex align-items-center w-100 py-3">
                        <input type="text" class="form-control w-100" placeholder="What's on your mind?"
                            style="background-color: #141A29; color: #3ABEFE; border: none; font-size: 1.1rem;"
                            name="caption">
                    </div>
                    <div class="mt-2">
                        <a href={{ route('posts.create') }}>
                            <button type="button" class="btn btn-sm btn-outline-secondary mr-2"
                                style="color: #848586; font-size: 1.1rem; margin-right: 10px">
                                <i class="far fa-images"></i> Images
                            </button>
                        </a>
                        <a href={{ route('posts.create') }}>
                            <button type="button" class="btn btn-sm btn-outline-secondary mr-2"
                                style="color: #848586; font-size: 1.1rem; margin-right: 10px">
                                <i class="fas fa-video"></i> Video
                            </button>
                        </a>
                        <a href={{ route('posts.create') }}>
                            <button type="button" class="btn btn-sm btn-outline-secondary mr-2"
                                style="color: #848586; font-size: 1.1rem; margin-right: 10px">
                                <i class="fas fa-map-marker-alt"></i> Location
                            </button>
                        </a>
                        <a href={{ route('posts.create') }}>
                            <button type="button" class="btn btn-sm btn-outline-secondary mr-2"
                                style="color: #848586; font-size: 1.1rem; margin-right: 10px">
                                <i class="fas fa-users"></i> Tag Friends
                            </button>
                        </a>
                        <a href={{ route('posts.create') }}>
                            <button type="button" class="btn btn-sm btn-outline-secondary mr-2"
                                style="color: #848586; font-size: 1.1rem; margin-right: 10px">
                                <i class="fas fa-calendar-alt"></i> Events
                            </button>
                        </a>

                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <button class="btn btn-sm btn-outline-secondary" style="color: #3ABEFE; font-size: 1.1rem;">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
