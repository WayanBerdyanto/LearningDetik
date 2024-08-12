<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:255',
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('homeindex')->with('toast_error', $e->getMessage())->withErrors($e->validator->errors());
        }

        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('homeindex')->with('toast_success', 'Logged out successfully.');
        } else if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('homeindex')->with('toast_success', 'Logged out successfully.');
        } else {
            return redirect()->route('homeindex')->with('toast_info', 'You are not logged in');
        }
    }
}
