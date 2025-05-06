<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FCMTokenController extends Controller
{
    public function saveToken(Request $request)
    {
        $user = Auth::user();
        $user->fcm_token = $request->token;
        $user->update();

        return response()->json(['message' => 'Token saved']);
    }
}
