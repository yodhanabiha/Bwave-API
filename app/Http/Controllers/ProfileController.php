<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return $user;
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $user->username = $input['username'];
        $user->photoUri = $input['photoUri'];
        $user->photoUriBg = $input['photoUriBg'];
        $user->bio = $input['bio'];
        $user->save();
    }
}
