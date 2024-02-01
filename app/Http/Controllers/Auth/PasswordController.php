<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
  public function update(Request $request): RedirectResponse
{
    try {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // Additional validation to check if the current password is correct
        if (!Hash::check($validated['current_password'], $request->user()->password)) {
            throw new \Exception('Password Lama Salah.');
        }

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Logout the user after updating the password
        Auth::logout();

        return redirect()->route('login')->with('status', 'password-updated');
    } catch (\Exception $e) {
        return back()->with('error', $e->getMessage())->withInput();
    }
}


}
