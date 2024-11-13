<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    // Display the users in index and dashboard

    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('profile.index', compact('users'));
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
    public function destroy(Request $request, $id = null): RedirectResponse
    {
        $currentUser = Auth::user();
    
        // Check if admin is deleting another user or user is deleting themselves
        if ($id && $currentUser->usertype === 'admin') {
            $user = User::find($id);  // Admin deleting another user
            if (!$user) {
                return Redirect::route('profile.index')->with('error', 'User not found.');
            }
        } else {
            $user = $currentUser;  // User deleting themselves
        }
    
        // Soft delete the user (this will not delete articles or galleries)
        $user->delete();
    
        // If the user deletes their own account, log them out and invalidate the session
        if ($user->id === $currentUser->id) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
    
        return Redirect::route('profile.index')->with('success', 'User account deleted, but articles and galleries remain.');
    }
    }