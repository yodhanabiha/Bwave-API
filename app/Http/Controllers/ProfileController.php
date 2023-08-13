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
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->photoUri = $request->input('photoUri');
        $user->photoUriBg = $request->input('photoUriBg');
    }
}
