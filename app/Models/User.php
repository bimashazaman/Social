<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function like(User $user)
    {
        if ($this->likedBy($user)) {
            return;
        }

        $this->likes()->create([
            'user_id' => $user->id,
        ]);
    }

    public function unlike(User $user)
    {
        $this->likes()->where('user_id', $user->id)->delete();
    }

    public function toggleLike(User $user)
    {
        if ($this->likedBy($user)) {
            return $this->unlike($user);
        }

        return $this->like($user);
    }

    public function getLikesCountAttribute()
    {
        return $this->likes->count();
    }

    public function getCommentsCountAttribute()
    {
        return $this->comments->count();
    }

    //friends
    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
    }

    public function friendsWith(User $user)
    {
        return (bool) $this->friends()->where('friend_id', $user->id)->count();
    }

    public function friendOfWith(User $user)
    {
        return (bool) $this->friendOf()->where('user_id', $user->id)->count();
    }

    public function friendRequestPending(User $user)
    {
        return (bool) $this->friendOf()->where('user_id', $user->id)->where('accepted', false)->count();
    }

    public function friendRequestReceived(User $user)
    {
        return (bool) $this->friends()->where('friend_id', $user->id)->where('accepted', false)->count();
    }

    public function addFriend(User $user)
    {
        $this->friends()->attach($user->id);
    }

    public function acceptFriendRequest(User $user)
    {
        $this->friendOf()->where('user_id', $user->id)->update(['accepted' => true]);
    }

    public function deleteFriend(User $user)
    {
        $this->friends()->detach($user->id);
        $this->friendOf()->detach($user->id);
    }

    public function getFriendsCountAttribute()
    {
        return $this->friends->count();
    }

    public function getFriendOfCountAttribute()
    {
        return $this->friendOf->count();
    }
}
