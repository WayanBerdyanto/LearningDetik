<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\UserModel;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:255',
                'password' => 'required|min:8',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'gender' => 'required|in:male,female',
                'birth_date' => 'required'
            ]);

        } catch (ValidationException $e) {
            return redirect()->route('homeindex')->with('toast_error', $e->getMessage())->withErrors($e->validator->errors());
        }

        $user = UserModel::where('username', $request->username)->first();

        if ($user) {
            return redirect()->route('homeindex')->with('toast_error', 'Username already registered');
        }

        $user = new UserModel();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->birth_date = $request->birth_date;
        $user->role = 'user';

        return redirect()->route('homeindex')->with('toast_success', 'Account Succesfully Created, ' . $user->username);

    }
}
