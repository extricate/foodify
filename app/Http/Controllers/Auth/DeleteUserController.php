<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DeleteUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Change Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password change requests
    |
    */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDeleteForm()
    {
        return view('modules.user.delete-account');
    }

    public function deleteUser(Request $request)
    {
        $request->validate([
            'current-password' => 'required|confirmed'
        ]);

        // Check the input password with the users' password
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with([
                'message' => 'That\'s not your current password. Please try again.',
                'alert_type' => 'danger',
                'error' => 'That\'s not your current password. Please try again.'
            ]);
        };

        $user = auth()->user();

        // Log the user out
        Auth::logout();

        // Delete the account
        if ($user->delete()) {
            return redirect()->home()->with(['message' => 'Your account has been permanently deleted!', 'alert_type' => 'success']);
        }

        return redirect()->home()->with([
            'message' => 'Something went wrong and we were unable to delete your account. Please contact our support to have them delete your account.',
                'alert_type' => 'danger',
                'error' => 'Something went wrong and we were unable to delete your account. Please contact our support to have them delete your account.'
        ]);

    }
}
