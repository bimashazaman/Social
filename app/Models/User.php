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

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')->withTimestamps();
    }

    /**
     * Get the friend requests sent by the user.
     */
    public function sentFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'user_id');
    }

    /**
     * Get the friend requests received by the user.
     */
    public function receivedFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'friend_id');
    }
}
