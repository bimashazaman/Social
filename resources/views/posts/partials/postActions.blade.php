 <div>
     @if ($post->likes->contains('user_id', auth()->user()->id))
         <a href="{{ route('who-liked', $post->id) }}" class="text-decoration-none"
             style="font-size: 0.8rem; color: #939494; margin-left: 10px;">
             <i class="fas fa-thumbs-up" style="color: #0D8ABC; margin-right: 10px"></i>
             @if ($post->likes->count() > 1)
                 You and {{ $post->likes->count() - 1 }} other people
             @else
                 {{ $post->likes->count() }} person
             @endif
         </a>
     @else
         @if ($post->likes->count() > 0)
             <a href="{{ route('who-liked', $post->id) }}" class="text-decoration-none"
                 style="font-size: 0.8rem; color: #939494; margin-left: 10px;">
                 {{ $post->likes->count() }} people likes
             </a>
         @else
             <div></div>
         @endif
     @endif
 </div>

 <div class="d-flex align-items-center justify-content-between w-100 mb-2 mt-3" x-data="{ showPopup: false }">
     <div class="d-flex align-items-center w-100 justify-content-around">
         <div class="pr-3">
             <a href="{{ route('comments.index', $post) }}" class="text-decoration-none"
                 style="font-family: 'Russo One', sans-serif; font-size: 1.2rem; margin-left: 10px; color: #3ABEFE;">
                 {{ $post->comments->count() }}
                 <i class="far fa-comment"></i>
             </a>
         </div>
         <div class="pr-3">
             <form
                 action=@if ($post->likes->contains('user_id', auth()->user()->id)) "{{ route('posts.unlike', $post) }}"
                                        @else
                                             "{{ route('posts.likes', $post) }}" @endif
                 method="POST" class="d-inline">
                 {{ $post->likes->count() }}
                 @csrf
                 @method('POST')
                 <button type="submit" class="btn btn-link text-decoration-none p-0 m-0"
                     style="font-size: 1.2rem; margin-left: 10px; color: #3ABEFE;" onclick="saveScrollPosition()">
                     @if ($post->likes->contains('user_id', auth()->user()->id))
                         <i class="fas fa-heart" style="color: #fe3a3a;"></i>
                     @else
                         <i class="far fa-heart"></i>
                     @endif
                 </button>
             </form>
         </div>


         <div class="pr-3">
             <div class="text-decoration-none" style="font-size: 1.2rem; margin-left: 10px; color: #3ABEFE;">
                 <i class="far fa-paper-plane" @click="showPopup = !showPopup" @click.away="showPopup = false"></i>
             </div>

         </div>

     </div>
     <div x-show="showPopup"
         style="position: absolute; z-index: 10; margin-top: 60px; margin-left: 10px; width: 300px; right: 0">
         <div class="card" style="margin-top: 50%">
             {!! Share::page(route('posts.show', $post), $post->title, [
                 'class' => 'btn btn-link text-decoration-none p-0 m-0',
                 'style' => 'font-size: 1.3rem; margin-left: 10px; color: #3ABEFE;',
             ])->facebook() !!} {!! Share::page(route('posts.show', $post), $post->title, [
                 'class' => 'btn btn-link text-decoration-none p-0 m-0',
                 'style' => 'font-size: 1.3rem; margin-left: 10px; color: #3ABEFE;',
             ])->linkedin() !!}

             {!! Share::page(route('posts.show', $post), $post->title, [
                 'class' => 'btn btn-link text-decoration-none p-0 m-0',
                 'style' => 'font-size: 1.3rem; margin-left: 10px; color: #3ABEFE;',
             ])->twitter() !!}
             {!! Share::page(route('posts.show', $post), $post->title, [
                 'class' => 'btn btn-link text-decoration-none p-0 m-0',
                 'style' => 'font-size: 1.3rem; margin-left: 10px; color: #3ABEFE;',
             ])->whatsapp() !!}
         </div>
     </div>
 </div>

 <div class="d-flex align-items-center px-2">
     @if ($post->comments->count() > 0)
         <div class="d-flex align-items-center">
             <div class="pr-3">
                 <a href="{{ route('profile.index', $post->comments->first()->user->id) }}">
                     <img src=@if ($post->comments->first()->user->avatar) {{ asset('avatars/' . $post->comments->first()->user->avatar) }}
                                    @else "https://ui-avatars.com/api/?name={{ $post->comments->first()->user->name }}&&background=0D8ABC&color=fff" @endif
                         class="rounded-circle" width="30" height="30" alt="">
                 </a>
             </div>
             <div>
                 <div class="font-weight-bold">
                     <a href="{{ route('profile.index', $post->comments->first()->user->id) }}"
                         class="text-decoration-none" style='font-size: 0.8rem; margin-left: 10px; color: #3ABEFE;'>
                         <span>{{ $post->comments->first()->user->username }}</span>
                     </a>
                 </div>
                 <div style="font-size: 0.8rem; margin-left: 10px;  color: #9da1a2;">
                     {{ $post->comments->first()->comment }}
                 </div>
             </div>
         </div>
     @endif
 </div>
