<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user = User::find($user_id);

        return view('profile.index', compact('user'));
    }
}
