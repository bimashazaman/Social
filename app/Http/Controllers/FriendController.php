<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function addFriend(Request $request, $id)
    {
        $user = auth()->user();
        $friend = User::findOrFail($id);

        // Check if friend request is already sent
        if ($user->sentFriendRequests->contains($friend)) {
            return redirect()->back()->with('error', 'Friend request already sent.');
        }

        // Check if friend request is already received
        if ($user->receivedFriendRequests->contains($friend)) {
            return redirect()->back()->with('error', 'Friend request already received.');
        }

        // Create a new friend request
        $friendRequest = new FriendRequest();
        $friendRequest->user_id = $user->id;
        $friendRequest->friend_id = $friend->id;
        $friendRequest->save();

        return redirect()->back()->with('success', 'Friend request sent successfully.');
    }

    public function acceptFriend(Request $request, $id)
    {
        $user = auth()->user();
        $friend = User::findOrFail($id);

        // Check if friend request is received
        if (!$user->receivedFriendRequests->contains($friend)) {
            return redirect()->back()->with('error', 'No friend request received from this user.');
        }

        // Create a new friend
        $friendship1 = new Friend();
        $friendship1->user_id = $user->id;
        $friendship1->friend_id = $friend->id;
        $friendship1->save();

        $friendship2 = new Friend();
        $friendship2->user_id = $friend->id;
        $friendship2->friend_id = $user->id;
        $friendship2->save();

        // Delete the friend request
        FriendRequest::where('user_id', $friend->id)
            ->where('friend_id', $user->id)
            ->delete();

        return redirect()->back()->with('success', 'Friend request accepted successfully.');
    }

    public function removeFriend(Request $request, $id)
    {
        $user = auth()->user();
        $friend = User::findOrFail($id);

        // Check if they are already friends
        if (!$user->friends->contains($friend)) {
            return redirect()->back()->with('error', 'They are not your friend.');
        }

        // Delete the friendship records
        Friend::where('user_id', $user->id)
            ->where('friend_id', $friend->id)
            ->delete();

        Friend::where('user_id', $friend->id)
            ->where('friend_id', $user->id)
            ->delete();

        return redirect()->back()->with('success', 'Friend removed successfully.');
    }
}
