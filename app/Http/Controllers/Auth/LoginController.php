<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:255',
                'password' => 'required|min:8',
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('homeindex')->with('toast_error', $e->getMessage())->withErrors($e->validator->errors());
        }

        $credentials = $request->only('username', 'password');

        $user = UserModel::where('username', $credentials['username'])->first();

        if (!$user) {
            return redirect()->route('homeindex')->with('toast_error', 'username not found');
        }

        if ($user->role === 'admin') {
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('homeindex')->with('toast_success', 'Welcome back, ' . Auth::guard('admin')->user()->first_name);
            }
        } else {
            if (Auth::attempt($credentials)) {
                return redirect()->route('homeindex')->with('toast_success', 'Welcome back, ' . Auth::user()->first_name);
            }
        }

        return redirect()->route('homeindex')->with('toast_error', 'Invalid credentials');
    }
}
