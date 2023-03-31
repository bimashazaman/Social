 <div class="d-flex align-items-center justify-content-between w-100 mb-2 mt-3">
     <div class="d-flex align-items-center w-100 justify-content-around">
         <div class="pr-3">
             <a href="{{ route('comments.index', $post) }}" class="text-decoration-none"
                 style="font-family: 'Russo One', sans-serif; font-size: 1rem; margin-left: 10px; color: #3ABEFE;">
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
                     onclick="saveScrollPosition()">
                     <i class="far fa-heart"></i>
                 </button>
             </form>
         </div>
         <div class="pr-3">
             <a href="{{ route('posts.show', $post) }}" class="text-decoration-none"
                 style="font-family: 'Russo One', sans-serif; font-size: 1rem; margin-left: 10px; color: #3ABEFE;">
                 3
                 <i class="far fa-paper-plane"></i>
             </a>
         </div>
     </div>
 </div>
