<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Resend\Laravel\Facades\Resend;
use Response;

class ProfileController extends Controller
{
    public function profile_page()
    {

        return view('auth.profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // 1. Validation
        // 'phone' remains nullable and digits-based
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'phone' => 'nullable|numeric|digits_between:10,15|unique:users,phone,' . $user->id,
        ]);

        // 2. Prepare data for update
        // We always want the name. 
        // For the phone, we only add it to the update array if it's present in the request.
        $updateData = ['name' => $validated['name']];

        if ($request->filled('phone')) {
            $updateData['phone'] = $validated['phone'];
        }

        // 3. Perform the update
        $user->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully!',
            'data' => $user->only(['name', 'phone'])
        ]);
    }
    public function profile_avatar_update(Request $request)
    {
        // 1. Validate the URL
        $valid_data = $request->validate([
            'avatar_url' => 'required|url|starts_with:https://api.dicebear.com'
        ]);

        // 2. Update the user (Correct Associative Array Syntax)
        auth()->user()->update([
            'avatar' => $valid_data['avatar_url']
        ]);

        // 3. Return JSON Response
        return response()->json([
            'success' => true,
            'message' => 'AVATAR SYNCED SUCCESSFULLY',
            'avatar_url' => auth()->user()->avatar // Optional: return the new URL
        ]);
    }
}
