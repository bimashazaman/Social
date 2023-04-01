 <div class="">
     <div class="">
         <center>
             <img src={{ $user->cover ? asset('covers/' . $user->cover) : 'https://images.pexels.com/photos/1796794/pexels-photo-1796794.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2' }}
                 alt="" width="80%" height="400px">
         </center>
     </div>
     <center style="margin-top: -100px">
         <img class="profile-image rounded-circle mb-4 border border-3 border-white"
             src={{ $user->avatar
                 ? asset('avatars/' . $user->avatar)
                 : "https://ui-avatars.com/api/?name=$user->name&background=0D8ABC&color=fff" }}
             alt="Profile Image" width="200" height="200">
     </center>
     <center>
         <h5 class="card-title" style="color: #0D8ABC; font-weight: bold">
             {{ $user->name }}
         </h5>
         <p class="card-text">
             ({{ $user->email }})
         </p>
         <p class="card-text">
             {{ $user->bio }}
         </p>
         @if (!Auth::guest())
             @if (auth()->user()->id == $user->id)
                 <a href="{{ route('profiles.edit', $user->id) }}"
                     style="background-color: #0D8ABC; border: none; color: white; padding: 10px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 15px;">Edit
                     Profile</a>
             @else
                 @if (auth()->user()->friends->contains($user))
                     <form action="{{ route('remove-friend', $user->id) }}" method="POST">
                         @csrf
                         <button type="submit"
                             style="background-color: #0D8ABC; border: none; color: white; padding: 10px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 15px;">Remove
                             Friend
                         </button>
                     </form>
                 @elseif (auth()->user()->sentFriendRequests->contains($user))
                     <p>Friend request sent</p>
                 @elseif (auth()->user()->receivedFriendRequests->contains($user))
                     <form action="{{ route('accept-friend', $user->id) }}" method="POST">
                         @csrf
                         <button type="submit"
                             style="background-color: #0D8ABC; border: none; color: white; padding: 10px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 15px;">Accept
                             Friend Request
                         </button>
                     </form>
                 @else
                     <form action="{{ route('add-friend', $user->id) }}" method="POST">
                         @csrf
                         <button type="submit"
                             style="background-color: #0D8ABC; border: none; color: white; padding: 10px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 15px;">Add
                             Friend
                         </button>
                     </form>
                 @endif
             @endif
         @endif

     </center>
 </div>
