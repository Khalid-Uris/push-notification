<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Notification;
use App\Models\User;
use App\Services\FirebaseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {

        return view('dashboard');
    }

    public function notifyUser(Request $request, FirebaseService $firebase)
    {
        $title = $request->title;
        $body = $request->body;
        $user = User::find(2); // or authenticated user
        // $firebaseToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();


        Notification::create([
            'title' => $title,
            'body' => $body,
            'user_id' => $user->id,
            'status' => 1
        ]);

        // return $user->fcm_token;
        // return $user;
        $firebase->sendNotification($user->fcm_token, $title, $body);

        // return $response;

        // return $firebase->test();

        return response()->json(['sent' => true]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
