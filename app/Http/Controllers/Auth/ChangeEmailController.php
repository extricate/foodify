<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserChangeEmailRequest;

class ChangeEmailController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Change Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email change requests
    |
    */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changeEmail(UserChangeEmailRequest $request)
    {
        // Check current password
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords do not match
            return redirect()->back()->with([
                'message' => 'That\'s not your current password. Please try again.',
                'alert_type' => 'danger',
                'error' => 'That\'s not your current password. Please try again.'
            ]);
        }

        // Check whether current password and new password are identical
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password are same
            return redirect()->back()->with([
                'message' => 'Your new password cannot be identical to your current password. Please choose a different new password.',
                'alert_type' => 'danger',
                'error' => 'Your new password cannot be identical to your current password. Please choose a different new password.',
            ]);
        }

        // Change Password
        $user = Auth::user();
        $user->email = $request->get('new-email');
        $user->save();

        return redirect()->home()->with(['message' => 'Email changed successfully!', 'alert_type' => 'success']);
    }
}
